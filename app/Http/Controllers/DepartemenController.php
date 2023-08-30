<?php

namespace App\Http\Controllers;

use App\Models\Departemen;
use App\Models\Ormawa;
use Illuminate\Http\Request;

class DepartemenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = session('u_data');
        $ormawa = Ormawa::where('user_id', $user->user_id)->first();
        $departemens = Departemen::where('ormawa_id', $ormawa->id)->get();
        return view('departemen.data-departemen', compact('departemens'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('departemen.departemen', with([
            'pageContext' => 'add'
        ]));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = session('u_data');
        $ormawa = Ormawa::where('user_id', $user->user_id)->first();


        $validatedData = $request->validate([
            'tahun_periode' => 'required',
        ]);

        if ($user->user_role == 1) {
            $departemen = new Departemen([
                'ormawa_id' => $validatedData['ormawa_id'],
                'user_id' => $user->user_id,
                'tahun_periode' => $validatedData['tahun_periode'],
                'nama_departemen' => $request->input('nama_departemen'),
                'ketua_departemen' => $request->input('ketua_departemen'),
                'email' => $request->input('email'),
                'alamat' => $request->input('alamat'),
                'no_tlp' => $request->input('no_tlp'),
                'password' => bcrypt($request->input('password')),
                'wakil_ketua' => $request->input('wakil_ketua'),
                'bendahara' => $request->input('bendahara'),
                'sekretaris' => $request->input('sekretaris'),
                'deskripsi_departemen' => $request->input('deskripsi_departemen'),
            ]);
        }

        $departemen = new Departemen([
            'ormawa_id' => $ormawa->id,
            'user_id' => $user->user_id,
            'tahun_periode' => $validatedData['tahun_periode'],
            'nama_departemen' => $request->input('nama_departemen'),
            'ketua_departemen' => $request->input('ketua_departemen'),
            'email' => $request->input('email'),
            'alamat' => $request->input('alamat'),
            'no_tlp' => $request->input('no_tlp'),
            'password' => bcrypt($request->input('password')),
            'wakil_ketua' => $request->input('wakil_ketua'),
            'bendahara' => $request->input('bendahara'),
            'sekretaris' => $request->input('sekretaris'),
            'deskripsi_departemen' => $request->input('deskripsi_departemen'),
        ]);

        $departemen->save();

        return redirect()->route('departemen.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('departemen.profile', with([
            'pageContext' => 'detail'
        ]));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('departemen.departemen', with([
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
