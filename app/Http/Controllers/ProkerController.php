<?php

namespace App\Http\Controllers;

use App\Models\DanaRab;
use App\Models\DanaRiil;
use App\Models\Produk;
use App\Models\Proker;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
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
        $prokersQuery = Proker::select('prokers.*', 'ormawa.name as ormawa_name', 'departemen.name as departemen_name')
            ->join('departemens', 'prokers.departemen_id', '=', 'departemens.id')
            ->join('ormawas', 'departemens.ormawa_id', '=', 'ormawas.id')
            ->join('users as ormawa', 'ormawas.user_id', '=', 'ormawa.id')
            ->join('users as departemen', 'departemens.user_id', '=', 'departemen.id');

        // Kasus 1: user_id 1
        if ($user->user_role == '1') {
            $prokers = $prokersQuery->get();
        }

        // Kasus 2: user_id 2
        if ($user->user_role == '2') {
            $prokers = $prokersQuery
                ->where('ormawas.id', $user->ormawa_id)
                ->get();
        }

        // Kasus 3: user_id 3
        if ($user->user_role == '3') {
            $prokers = $prokersQuery
                ->where('departemens.id', $user->departemen_id)
                ->get();
        }

        return view('proker.data-proker', compact('prokers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $proker = [];
        $suppliers = [];
        $danaRab = [];
        return view('proker.proker', with([
            'pageContext' => 'add',
            'suppliers' => $suppliers,
            'proker' => $proker,
            'danaRabs' => $danaRab,
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
                        // 'total_harga' => $request->rab_totalharga[$i], //broken
                        'total_harga' => $request->rab_hargasatuan[$i] * $request->rab_qty[$i],
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
        $proker = Proker::findOrFail($id);
        $danaRab = DanaRab::where('proker_id', $proker->id)->get();
        $danaRiil = DanaRiil::where('proker_id', $proker->id)->with('supplier', 'supplier.produk')->get();
        $sumTotalHargaRab = DanaRab::where('proker_id', $id)->sum('total_harga');
        $sumTotalHargaRiil = DanaRiil::where('proker_id', $id)->sum('total_harga');

        foreach ($danaRiil as $dr) {
            $meanProduk = DanaRiil::where('supplier_id', $dr->supplier_id)->where('status_id', 1)->avg('harga_satuan');

            if ($dr->harga_satuan > $meanProduk) {
                $dr->warning = true;
                $dr->mean_price = round($meanProduk, 0);
            } else {
                $dr->warning = false;
                $dr->mean_price = null;
            }
        }
        return view('proker.proker-print', with([
            'pageContext' => 'detail',
            'proker' => $proker,
            'danaRabs' => $danaRab,
            'danaRiils' => $danaRiil,
            'suppliers' => Supplier::with('produk')->get(),
            'danaDipakaiRab' => $sumTotalHargaRab,
            'danaDipakaiRiil' => $sumTotalHargaRiil,
            'sisaDanaRiil' => $proker->dana - $sumTotalHargaRiil,
        ]));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $proker = Proker::findOrFail($id);
        $danaRab = DanaRab::where('proker_id', $proker->id)->get();
        $danaRiil = DanaRiil::where('proker_id', $proker->id)->with('supplier', 'supplier.produk')->get();
        $sumTotalHargaRab = DanaRab::where('proker_id', $id)->sum('total_harga');
        $sumTotalHargaRiil = DanaRiil::where('proker_id', $id)->sum('total_harga');

        foreach ($danaRiil as $dr) {
            $meanProduk = DanaRiil::where('supplier_id', $dr->supplier_id)->where('status_id', 1)->avg('harga_satuan');

            if ($dr->harga_satuan > $meanProduk) {
                $dr->warning = true;
                $dr->mean_price = round($meanProduk, 0);
            } else {
                $dr->warning = false;
                $dr->mean_price = null;
            }
        }
        return view('proker.proker', with([
            'pageContext' => 'edit',
            'proker' => $proker,
            'danaRabs' => $danaRab,
            'danaRiils' => $danaRiil,
            'suppliers' => Supplier::with('produk')->get(),
            'danaDipakaiRab' => $sumTotalHargaRab,
            'danaDipakaiRiil' => $sumTotalHargaRiil,
            'sisaDanaRiil' => $proker->dana - $sumTotalHargaRiil,
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
        // return response()->json([
        //     // "proker" => $getProker->id,
        //     // "rab" => DanaRab::where('proker_id', $getProker->id)->get(),
        //     // "riil" => DanaRiil::where('proker_id', $getProker->id)->get(),
        //     'request' => $request->all(),
        // ]);

        if ($user->user_role == '1') {
            // $dataOnly = $request->only(['tipe_dana', 'status_proker', 'dana', 'riil_id', 'status_riil']);
            // return response()->json($dataOnly);
            $updateProker = Proker::where('id', $getProker->id)->update([
                'tipe_dana_id' => $request->tipe_dana,
                'status_id'    => $request->status_proker,
                'dana'         => $request->dana
            ]);

            if ($updateProker) {
                if ($request->riil_id) {
                    foreach ($request->riil_id as $key => $riilId) {

                        DanaRiil::where('id', $riilId)->update([
                            'status_id' => $request->status_riil[$key]
                        ]);
                    }
                }
                return redirect()->back()->with('success', 'Data Proker Berhasil Diperbarui');
            }
        } elseif ($user->user_role == '3') {
            // dd($request->all());
            // return response()->json($request->all());
            Validator::validate($request->all(), [
                'file_proposal' => [
                    File::types(['pdf', 'doc', 'docx'])
                ],
                'file_lpj' => [
                    File::types(['pdf', 'doc', 'docx'])
                ],
            ]);

            $validatedData = $request->validate([
                'rab_nama' => 'required',
                'rab_hargasatuan' => 'required',
                'rab_qty' => 'required',
            ]);

            if ($request->rab_qty) {
                foreach ($request->rab_qty as $rq) {
                    if ($rq == null) {
                        return redirect()->route('proker.index')->with('failed', 'Telah terjadi kesalahan');
                    }
                }
            }

            if ($request->rab_hargasatuan) {
                foreach ($request->rab_hargasatuan as $rq) {
                    if ($rq == null) {
                        return redirect()->route('proker.index')->with('failed', 'Telah terjadi kesalahan');
                    }
                }
            }

            if ($request->riil_qty) {
                foreach ($request->riil_qty as $rq) {
                    if ($rq == null) {
                        return redirect()->route('proker.index')->with('failed', 'Telah terjadi kesalahan');
                    }
                }
            }

            if ($request->riil_hargasatuan) {
                foreach ($request->riil_hargasatuan as $rq) {
                    if ($rq == null) {
                        return redirect()->route('proker.index')->with('failed', 'Telah terjadi kesalahan');
                    }
                }
            }

            $validatedData2 = $request->validate([
                'nama_proker' => 'required',
                'ketua_proker' => 'required',
                'bendahara_proker' => 'required',
                'keterangan' => 'required',
            ]);

            $getProker->nama = $validatedData2['nama_proker'];
            $getProker->ketua = $validatedData2['ketua_proker'];
            $getProker->bendahara = $validatedData2['bendahara_proker'];
            $getProker->keterangan = $validatedData2['keterangan'];

            if ($request->hasFile('file_proposal') && $request->file('file_proposal')->isValid()) {
                if ($getProker->file_proposal) {
                    Storage::disk('public')->delete($getProker->file_proposal);
                }
                $fileProposal = $request->file('file_proposal');
                $proposalPath = $fileProposal->storePubliclyAs('file_proposal', $this->renameFileToRandom($fileProposal), 'public');
                $getProker->file_proposal = $proposalPath;
            }

            if ($request->hasFile('file_lpj') && $request->file('file_lpj')->isValid()) {
                if ($getProker->file_lpj) {
                    Storage::disk('public')->delete($getProker->file_lpj);
                }
                $fileLpj = $request->file('file_lpj');
                $lpjPath = $fileLpj->storePubliclyAs('file_lpj', $this->renameFileToRandom($fileLpj), 'public');
                $getProker->file_lpj = $lpjPath;
            }

            if ($getProker->save()) {
                foreach ($request->rab_nama as $key => $nama) {
                    if (isset($request->id_rab[$key])) {
                        DanaRab::where('id', $request->id_rab[$key])->update([
                            'proker_id' => $getProker->id,
                            'nama' => $validatedData['rab_nama'][$key],
                            'harga_satuan' => $validatedData['rab_hargasatuan'][$key],
                            'quantity' => $validatedData['rab_qty'][$key],
                            'total_harga' => $validatedData['rab_hargasatuan'][$key] * $validatedData['rab_qty'][$key],
                        ]);
                    } else {
                        DanaRab::create([
                            'proker_id' => $getProker->id,
                            'nama' => $validatedData['rab_nama'][$key],
                            'harga_satuan' => $validatedData['rab_hargasatuan'][$key],
                            'quantity' => $validatedData['rab_qty'][$key],
                            'total_harga' => $validatedData['rab_hargasatuan'][$key] * $validatedData['rab_qty'][$key],
                        ]);
                    }
                }

                // DanaRiil::where('proker_id', $getProker->id)->forceDelete();
                foreach ($request->riil_nama as $key => $riilNama) {
                    if (
                        isset($_FILES['riil_bukti_changes']['tmp_name'][$key]) &&
                        is_uploaded_file($_FILES['riil_bukti_changes']['tmp_name'][$key])
                    ) {
                        Validator::validate($request->all(), [
                            'riil_bukti_changes.' . $key => [
                                File::types(['png', 'jpg', 'jpeg'])
                            ],
                        ]);
                    }

                    $validatedData = $request->validate([
                        'riil_nama' => 'required',
                        'riil_hargasatuan' => 'required',
                        'riil_qty' => 'required',
                        // 'riil_bukti_changes' => 'required'
                    ]);

                    if (isset($request->riil_id[$key])) {
                        $riil = DanaRiil::find($request->riil_id[$key]);
                        if ($getProker->id) {
                            $riil->proker_id = $getProker->id;
                            $riil->supplier_id =  $validatedData['riil_nama'][$key];
                            $riil->harga_satuan = $validatedData['riil_hargasatuan'][$key];
                            $riil->quantity = $validatedData['riil_qty'][$key];
                            $riil->total_harga = $validatedData['riil_hargasatuan'][$key] *  $validatedData['riil_qty'][$key];
                            $riil->status_id = $request->status_riil[$key] ?? 3;

                            if (
                                $request->hasFile('riil_bukti_changes') &&
                                isset($request->file('riil_bukti_changes')[$key]) &&
                                $request->file('riil_bukti_changes')[$key]->isValid()
                            ) {
                                $file = $request->file('riil_bukti_changes')[$key];
                                $randomName = $this->renameFileToRandom($file);
                                $path = $file->storePubliclyAs('file_bukti_riil', $randomName, 'public');
                                $riil->bukti = $path;

                                if (isset($request->riil_bukti[$key])) {
                                    $oldPath = $request->riil_bukti[$key];
                                    Storage::disk('public')->delete($oldPath);
                                }

                                if ($riil->save()) {
                                    redirect()->back()->with('success', 'Data Proker Berhasil Diperbarui');
                                }
                            } else {
                                redirect()->back()->with('failed', 'Telah terjadi kesalahan');
                            }
                        }
                    } else {
                        $riil = new DanaRiil;
                        if ($getProker->id) {
                            $riil->proker_id = $getProker->id;
                            $riil->supplier_id =  $validatedData['riil_nama'][$key];
                            $riil->harga_satuan = $validatedData['riil_hargasatuan'][$key];
                            $riil->quantity = $validatedData['riil_qty'][$key];
                            $riil->total_harga = $validatedData['riil_hargasatuan'][$key] *  $validatedData['riil_qty'][$key];
                            $riil->status_id = $request->status_riil[$key] ?? 3;

                            if (
                                $request->hasFile('riil_bukti_changes') &&
                                isset($request->file('riil_bukti_changes')[$key]) &&
                                $request->file('riil_bukti_changes')[$key]->isValid()
                            ) {
                                $file = $request->file('riil_bukti_changes')[$key];
                                $randomName = $this->renameFileToRandom($file);
                                $path = $file->storePubliclyAs('file_bukti_riil', $randomName, 'public');
                                $riil->bukti = $path;

                                if ($riil->save()) {
                                    redirect()->back()->with('success', 'Data Proker Berhasil Diperbarui');
                                }
                            } else {
                                redirect()->back()->with('failed', 'Telah terjadi kesalahan');
                            }
                        }
                    }
                }
                return redirect()->back()->with('success', 'Data Proker Berhasil Diperbarui');
            }
        }

        return redirect()->back()->with('failed', 'Telah terjadi kesalahan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            DB::beginTransaction();

            $getProker = Proker::findOrFail($id);

            if ($getProker) {
                if ($getProker->file_proposal) {
                    Storage::disk('public')->delete($getProker->file_proposal);
                }
                if ($getProker->file_lpj) {
                    Storage::disk('public')->delete($getProker->file_lpj);
                }

                $danaRiils = DanaRiil::where('proker_id', $getProker->id)->get();
                foreach ($danaRiils as $danaRiil) {
                    if ($danaRiil->bukti) {
                        Storage::disk('public')->delete($danaRiil->bukti);
                    }
                    $danaRiil->delete();
                }

                DanaRab::where('proker_id', $getProker->id)->delete();

                $getProker->delete();

                DB::commit();
                return redirect()->back()->with('success', 'Data berhasil dihapus');
            } else {
                DB::rollBack();
                return redirect()->back()->with('failed', 'Data tidak ditemukan');
            }
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('failed', 'Telah terjadi kesalahan');
        }
    }

    public function destroyDanaRiil(string $id)
    {
        $getRiil = DanaRiil::findOrFail($id);
        if ($getRiil->delete()) {
            Storage::disk('public')->delete($getRiil->bukti);
            return redirect()->back()->with('success', 'Dana Riil Berhasil Dihapus');
        }
        return redirect()->back()->with('failed', 'Telah terjadi kesalahan');
    }

    public function destroyDanaRab(string $id)
    {
        $getRiil = DanaRab::findOrFail($id);
        if ($getRiil->delete()) {
            return redirect()->back()->with('success', 'Dana Rab Berhasil Dihapus');
        }
        return redirect()->back()->with('failed', 'Telah terjadi kesalahan');
    }
}
