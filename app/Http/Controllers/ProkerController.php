<?php

namespace App\Http\Controllers;

use App\Models\DanaRab;
use App\Models\Departemen;
use App\Models\Proker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ProkerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('proker.data-proker');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('proker.proker', with([
            'pageContext' => 'add'
        ]));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return response()->json($request);
        $user = Auth::user();

        // store
        if ($user->role_id == 3) {
            $request->validate([
                'nama_proker' => 'required',
                'ketua_proker' => 'required',
                'bendahara_proker' => 'required',
                'rab_proposal' => 'required|mimes:pdf,doc,docx',
            ]);

            if ($request->hasFile('rab_proposal')) {
                $file = $request->file('rab_proposal');
                $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
                $extension = $file->getClientOriginalExtension();
                $randomString = Str::random(10);
                $newFileName = $originalName . '_' . $randomString . '.' . $extension;

                $path = $file->storePubliclyAs('proposal_rab', $newFileName, 'public');

                $userDepartment = Departemen::where('user_id', $user->id)->first();
                $prokerData = [
                    'user_id' => $userDepartment->user_id,
                    'departemen_id' => $userDepartment->id,
                    'nama' => $request->nama_proker,
                    'ketua' => $request->ketua_proker,
                    'bendahara' => $request->bendahara_proker,
                    'Proposal' => $path,
                    'keterangan' => $request->keterangan,
                ];

                $prokerStore = Proker::create($prokerData);

                if ($prokerStore && count($request->rab_nama) > 0) {
                    $rabData = [];
                    for ($i = 0; $i < count($request->rab_nama); $i++) {
                        $rabData[] = [
                            'nama' => $request->rab_nama[$i],
                            'proker_id' => $prokerStore->id,
                            'harga_satuan' => $request->rab_hargasatuan[$i],
                            'quantity' => $request->rab_qty[$i],
                            'total_harga' => $request->rab_totalharga[$i],
                            'tempat_pembelian' => $request->rab_tmptbeli[$i],
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
        return view('proker.proker', with([
            'pageContext' => 'edit'
        ]));
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
