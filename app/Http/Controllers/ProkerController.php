<?php

namespace App\Http\Controllers;

use App\Models\DanaRab;
use App\Models\Departemen;
use App\Models\Ormawa;
use App\Models\Proker;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

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
        return response()->json($request->all());
        $user = session('u_data');
        // return response()->json($user);

        // store
        if ($user->user_role == 3) {
            $request->validate([
                'nama_proker' => 'required',
                'ketua_proker' => 'required',
                'bendahara_proker' => 'required',
                'file_proposal' => 'required|mimes:pdf,doc,docx',
                'file_lpj' => 'required|mimes:pdf,doc,docx',
            ]);

            if ($request->hasFile('file_proposal') || ($request->hasFile('file_lpj'))) {
                $file = $request->file('file_proposal');
                $path = $file->storePubliclyAs('file_proposal', $this->renameFileToRandom($file), 'public');

                $prokerStore = Proker::create([
                    'user_id' => $user->user_id,
                    'departemen_id' => $user->departemen_id,
                    'nama' => $request->nama_proker,
                    'ketua' => $request->ketua_proker,
                    'bendahara' => $request->bendahara_proker,
                    'proposal' => $path,
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
                    return redirect('proker')->with('success', 'Proker data has been successfully saved');
                }
            }
        }

        return redirect()->back();
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('proker.proker', with([
            'pageContext' => 'detail'
        ]));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $proker = Proker::findOrFail($id);
        $danaRab = DanaRab::where('proker_id', $proker->id)->get();
        return view('proker.proker', with([
            'pageContext' => 'edit',
            'proker' => $proker,
            'danaRabs' => $danaRab
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
