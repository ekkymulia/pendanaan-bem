<?php

namespace App\Http\Controllers;

use App\Models\DanaRab;
use App\Models\DanaRiil;
use App\Models\Departemen;
use App\Models\Ormawa;
use App\Models\Proker;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules\File;

class ProkerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = session('u_data');
        $prokers = [];
        if ($user->user_role == '1') {
            $prokers = Proker::with('departemen.ormawa')->get();
        } elseif ($user->user_role == '2') {
            $prokers = Proker::with([
                'departemen.ormawa:id,nama_ormw'
            ])->whereHas('departemen', function ($query) use ($user) {
                $query->where('ormawa_id', $user->ormawa_id);
            })->get();
        } else {
            $prokers = Proker::with([
                'departemen:id,nama_departemen,ormawa_id',
                'departemen.ormawa:id,nama_ormw'
            ])->where('departemen_id', $user->departemen_id)->get();
        }

        // return response()->json($prokers);
        return view('proker.data-proker', compact('prokers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $proker = [];
        $danaRab = [];
        return view('proker.proker', with([
            'pageContext' => 'add',
            'proker' => $proker,
            'danaRabs' => $danaRab
        ]));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return response()->json($request->all());
        $user = session('u_data');

        // store
        if ($user->user_role == '3') {
            Validator::validate($request->all(), [
                'nama_proker' => ['required'],
                'ketua_proker' => ['required'],
                'bendahara_proker' => ['required'],
                'file_proposal' => [
                    'required',
                    File::types(['pdf', 'doc', 'docx'])
                ],
                'file_lpj' => [
                    File::types(['pdf', 'doc', 'docx'])
                ],
            ]);

            $path = '';
            if ($request->hasFile('file_proposal') && $request->file('file_proposal')->isValid()) {
                $file = $request->file('file_proposal');
                $path = $file->storePubliclyAs('file_proposal', $this->renameFileToRandom($file), 'public');
            }
            $prokerStore = Proker::create([
                'user_id' => $user->user_id,
                'departemen_id' => $user->departemen_id,
                'nama' => $request->nama_proker,
                'ketua' => $request->ketua_proker,
                'bendahara' => $request->bendahara_proker,
                'file_proposal' => $path,
                'keterangan' => $request->keterangan,
            ]);

            if ($prokerStore && count($request->rab_nama) > 0) {
                $rabData = [];
                for ($i = 0; $i < count($request->rab_nama); $i++) {
                    $rabData[] = [
                        'nama' => $request->rab_nama[$i],
                        'proker_id' => $prokerStore->id,
                        'harga_satuan' => $request->rab_hargasatuan[$i],
                        'quantity' => $request->rab_qty[$i],
                        'total_harga' => $request->rab_totalharga[$i],
                    ];
                }
                DanaRab::insert($rabData);
                return redirect('proker')->with('success', 'Proker baru berhasil ditambah');
            }
        }

        return redirect()->back()->with('failed', 'Telah terjadi kesalahan');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // return view('proker.proker', with([
        //     'pageContext' => 'detail'
        // ]));

        $proker = Proker::findOrFail($id);
        return redirect()->route('proker.edit', $proker->id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $proker = Proker::findOrFail($id);
        $danaRab = DanaRab::where('proker_id', $proker->id)->get();
        $danaRiil = DanaRiil::where('proker_id', $proker->id)->get();
        return view('proker.proker', with([
            'pageContext'   => 'edit',
            'proker'        => $proker,
            'danaRabs'      => $danaRab,
            'danaRiils'     => $danaRiil,
            'sisaDanaRiils' => DanaRiil::where('proker_id', $id)->sum('total_harga'),
        ]));
    }

    public function renameFileToRandom(UploadedFile $file)
    {
        $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $extension = $file->getClientOriginalExtension();
        $randomString = Str::random(10);
        $newFileName = $originalName . '_' . $randomString . '.' . $extension;
        return $newFileName;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = session('u_data');
        $getProker = Proker::findOrFail($id);
        if ($user->user_role == '1') {
            $dataOnly = $request->only(['tipe_dana', 'status_proker', 'dana', 'id_riil', 'status_riil']);
            return response()->json($dataOnly);
            $updateProker = Proker::where('id', $getProker->id)->update([
                'tipe_dana_id' => $request->tipe_dana,
                'status_id'    => $request->status_proker,
                'dana'         => $request->dana
            ]);

            if ($updateProker) {
                return redirect()->back()->with('success', 'Data Proker Berhasil Diperbarui');
            }
        } elseif ($user->user_role == '3') {
            Validator::validate($request->all(), [
                'file_proposal' => [
                    File::types(['pdf', 'doc', 'docx'])
                ],
                'file_lpj' => [
                    File::types(['pdf', 'doc', 'docx'])
                ],
                'riil_bukti.*' => [
                    'sometimes',
                    File::types(['png', 'jpg', 'jpeg'])
                ],
            ]);

            $getProker->nama = $request->nama_proker;
            $getProker->ketua = $request->ketua_proker;
            $getProker->bendahara = $request->bendahara_proker;
            $getProker->keterangan = $request->keterangan;

            if ($request->hasFile('file_proposal') && $request->file('file_proposal')->isValid()) {
                Storage::disk('public')->delete($getProker->file_proposal);
                $fileProposal = $request->file('file_proposal');
                $proposalPath = $fileProposal->store('file_proposal', 'public');
                $getProker->file_proposal = $proposalPath;
            }

            if ($request->hasFile('file_lpj') && $request->file('file_lpj')->isValid()) {
                Storage::disk('public')->delete($getProker->file_lpj);
                $fileLpj = $request->file('file_lpj');
                $lpjPath = $fileLpj->store('file_lpj', 'public');
                $getProker->file_lpj = $lpjPath;
            }

            if ($getProker->save()) {
                DanaRab::where('proker_id', $id)->delete();
                foreach ($request['rab_nama'] as $key => $nama) {
                    DanaRab::create([
                        'proker_id' => $id,
                        'nama' => $nama,
                        'harga_satuan' => $request['rab_hargasatuan'][$key],
                        'quantity' => $request['rab_qty'][$key],
                        'total_harga' => $request['rab_totalharga'][$key],
                    ]);
                }

                DanaRiil::where('proker_id', $id)->delete();
                foreach ($request['riil_nama'] as $key => $nama) {
                    $riil = DanaRiil::find($id);
                    if (!$riil) {
                        continue;
                    }
                    $riil = new DanaRiil([
                        'proker_id' => $id,
                        'nama' => $nama,
                        'harga_satuan' => $request['riil_hargasatuan'][$key],
                        'quantity' => $request['riil_qty'][$key],
                        'total_harga' => $request['total_harga'][$key],
                        'tempat_pembelian' => $request['riil_tmptbeli'][$key],
                        'status_id' => $request['status_riil'][$key] ?? 3,
                    ]);

                    if ($request->hasFile('riil_bukti') && $request->file('riil_bukti')[$key]->isValid()) {
                        $file = $request->file('riil_bukti')[$key];
                        $randomName = $this->renameFileToRandom($file);
                        $path = $file->storePubliclyAs('file_bukti_riil', $randomName, 'public');
                        $riil->bukti = $path;
                        $oldRiil = DanaRiil::find($id);
                        if ($oldRiil) {
                            Storage::disk('public')->delete($oldRiil->bukti);
                        }
                    } else {
                        $riil->bukti = $request['riil_bukti'][$key];
                    }

                    $riil->save();
                }
            }
        }

        return redirect()->back()->with('success', 'Proker berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
