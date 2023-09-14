<?php

namespace App\Http\Controllers;

use App\Models\Departemen;
use App\Models\Ormawa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DepartemenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user = session('u_data');
        $getOrmawa = [];
        if ($user->user_role == '1') {
            $anyId = $request->query('id');
            $getOrmawa = Ormawa::findOrFail($anyId);
        }
        if ($user->user_role == '2') {
            $getOrmawa = Ormawa::findOrFail($user->ormawa_id);
        }
        $departemens = [
            'data_ormw' => $getOrmawa,
            'data_dept' => Departemen::where('ormawa_id', $getOrmawa->id)->get()
        ];
        return view('departemen.data-departemen', compact('departemens'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = session('u_data');
        $ormawa = null;
        if ($user->user_role == '1') {
            $ormawa = Ormawa::select('id', 'nama_ormw')->get();
        }

        return view('departemen.departemen', with([
            'pageContext' => 'add',
            'mode' => '',
            'ormawa' => $ormawa
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
            'nama_departemen' => 'required',
            'ketua_departemen' => 'required',
            'email' => 'required',
            'password' => 'required',
            'ormawa_id' => 'numeric|nullable',
            'tahun_periode' => 'numeric|nullable',
            'ketua_departemen' => 'string|nullable',
            'alamat' => 'string|nullable',
            'no_tlp' => 'numeric|nullable',
            'wakil_ketua' => 'string|nullable',
            'bendahara' => 'string|nullable',
            'sekretaris' => 'string|nullable',
            'deskripsi_departemen' => 'string|nullable',
            'profile_img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $new_user = new User([
            'email' =>  $validatedData['email'],
            'name' => $validatedData['nama_departemen'],
            'password' => Hash::make($validatedData['password']),
            'role_id' => 3
        ]);

        if ($request->hasFile('profile_img')) {
            $profileImage = $request->file('profile_img');
            $imageName = 'profile_' . time() . '.' . $profileImage->getClientOriginalExtension();
            $profileImage->move(public_path('profile_images'), $imageName);
            $user->profile_img = 'profile_images/' . $imageName;
        }

        $new_user->save();

        if ($user->user_role == 1) {
            $departemen = new Departemen([
                'ormawa_id' => $validatedData['ormawa_id'],
                'user_id' => $new_user->id,
                'tahun_periode' => $validatedData['tahun_periode'],
                'ketua_departemen' => $validatedData['ketua_departemen'],
                'alamat' => $validatedData['alamat'],
                'no_tlp' => $validatedData['no_tlp'],
                'wakil_ketua' => $validatedData['wakil_ketua'],
                'bendahara' => $validatedData['bendahara'],
                'sekretaris' => $validatedData['sekretaris'],
                'deskripsi_departemen' => $validatedData['deskripsi_departemen'],
            ]);
        } else {
            $departemen = new Departemen([
                'ormawa_id' => $ormawa->id,
                'user_id' => $new_user->id,
                'tahun_periode' => $validatedData['tahun_periode'],
                'ketua_departemen' => $validatedData['ketua_departemen'],
                'alamat' => $validatedData['alamat'],
                'no_tlp' => $validatedData['no_tlp'],
                'wakil_ketua' => $validatedData['wakil_ketua'],
                'bendahara' => $validatedData['bendahara'],
                'sekretaris' => $validatedData['sekretaris'],
                'deskripsi_departemen' => $validatedData['deskripsi_departemen'],
            ]);
        }

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
        $departemen = Departemen::with('user')->find($id);

        if (!$departemen) {
            return redirect()->route('departemen.index')->with('error', 'Departemen not found.');
        }

        $ormawas = Ormawa::all();

        return view('departemen.departemen', [
            'pageContext' => 'edit',
            'mode' => '',
            'departemen' => $departemen,
            'ormawa' => $ormawas
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = session('u_data');

        $validatedData = $request->validate([
            'tahun_periode' => 'required',
            'nama_departemen' => 'required',
            'email' => 'required',
            'password' => 'nullable',
            'ketua_departemen' => 'required',
            'email' => 'required',
            'ormawa_id' => 'numeric|nullable',
            'tahun_periode' => 'numeric|nullable',
            'ketua_departemen' => 'string|nullable',
            'alamat' => 'string|nullable',
            'no_tlp' => 'numeric|nullable',
            'wakil_ketua' => 'string|nullable',
            'bendahara' => 'string|nullable',
            'sekretaris' => 'string|nullable',
            'deskripsi_departemen' => 'string|nullable',
        ]);

        $departemen = Departemen::find($id);

        if (!$departemen) {
            return redirect()->route('departemen.index')->with('error', 'Departemen not found.');
        }

        $user = $departemen->user;
        $user->email = $validatedData['email'];
        $user->name = $validatedData['nama_departemen'];

        if ($request->hasFile('profile_img')) {
            $profileImage = $request->file('profile_img');
            $imageName = 'profile_' . time() . '.' . $profileImage->getClientOriginalExtension();
            $profileImage->move(public_path('profile_images'), $imageName);
            $user->profile_img = 'profile_images/' . $imageName;
        }

        if (!empty($validatedData['password'])) {
            $user->password = Hash::make($validatedData['password']);
        }

        if ($user->user_role == 1) {
            $departemen->update([
                'tahun_periode' => $validatedData['tahun_periode'],
                'nama_departemen' => $validatedData['nama_departemen'],
                'ketua_departemen' => $validatedData['ketua_departemen'],
                'ormawa_id' => $validatedData['ormawa_id'],
                'alamat' => $validatedData['alamat'],
                'no_tlp' => $validatedData['no_tlp'],
                'wakil_ketua' => $validatedData['wakil_ketua'],
                'bendahara' => $validatedData['bendahara'],
                'sekretaris' => $validatedData['sekretaris'],
                'deskripsi_departemen' => $validatedData['deskripsi_departemen'],
            ]);
        } else {
            $departemen->update([
                'tahun_periode' => $validatedData['tahun_periode'],
                'nama_departemen' => $validatedData['nama_departemen'],
                'ketua_departemen' => $validatedData['ketua_departemen'],
                'alamat' => $validatedData['alamat'],
                'no_tlp' => $validatedData['no_tlp'],
                'wakil_ketua' => $validatedData['wakil_ketua'],
                'bendahara' => $validatedData['bendahara'],
                'sekretaris' => $validatedData['sekretaris'],
                'deskripsi_departemen' => $validatedData['deskripsi_departemen'],
            ]);
        }

        $departemen->push();
        $user->push();

        if ($request->input('mode') == 'profile') {
            session('u_data')->user_name = $user->name;
            session('u_data')->user_profile_img = $user->profile_img;
            return redirect()->route('profile');
        }

        return redirect()->route('departemen.index')->with('success', 'Departemen updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $departemen = Departemen::find($id);

        if (!$departemen) {
            return redirect()->route('departemen.index')->with('error', 'Departemen not found.');
        }

        // Delete associated user
        $user = User::find($departemen->user_id);

        if ($user) {
            $user->delete();
        }

        // Delete the departemen record
        $departemen->delete();

        return redirect()->route('departemen.index')->with('success', 'Departemen deleted successfully.');
    }
}
