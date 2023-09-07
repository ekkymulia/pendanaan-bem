<?php

namespace App\Http\Controllers;

use App\Models\Departemen;
use App\Models\Ormawa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class OrmawaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = session('u_data');

        if($user->user_role == 1){
            $ormawas = Ormawa::all();
        }else{
            $ormawas = Ormawa::where('user_id', $user->user_id)->get();
        }
        return view('ormawa.data-ormawa', compact('ormawas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ormawa.ormawa', with([
            'pageContext' => 'add'
        ]));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_ormawa' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'tahun_periode' => 'required',
            'ketua_ormawa' => 'nullable|string',
            'wakil_ketua' => 'string|nullable',
            'bendahara' => 'string|nullable',
            'sekretaris' => 'string|nullable',
            'ketua_pengawas' => 'string|nullable',
            'fakultas' => 'string|nullable',
            'alamat' => 'string|nullable',
            'no_telp' => 'string|nullable',
        ]);
    
        $user = new User([
            'email' => $validatedData['email'],
            'name' => $validatedData['nama_ormawa'],
            'password' => Hash::make($validatedData['password']),
            'role_id' => 2,
        ]);

        if ($request->hasFile('profile_img')) {
            $profileImage = $request->file('profile_img');
            $imageName = 'profile_' . time() . '.' . $profileImage->getClientOriginalExtension();
            $profileImage->move(public_path('profile_images'), $imageName);
            $user->profile_img = 'profile_images/' . $imageName;
        }
        
        $user->save();
    
        $ormawa = new Ormawa([
            'nama_ormawa' => $validatedData['nama_ormawa'],
            'tahun_periode' => $validatedData['tahun_periode'],
            'ketua' => $validatedData['ketua_ormawa'],
            'wakil' => $validatedData['wakil_ketua'],
            'bendahara' => $validatedData['bendahara'],
            'sekretaris' => $validatedData['sekretaris'],
            'ketua_pengawas' => $validatedData['ketua_pengawas'],
            'fakultas' => $validatedData['fakultas'],
            'alamat' => $validatedData['alamat'],
            'no_telp' => $validatedData['no_telp'],
            'user_id' => $user->id, // Associate the user with the Ormawa record
        ]);
    
        $ormawa->save();
    
        return redirect()->route('ormawa.index')->with('success', 'Ormawa created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('ormawa.profile', with([
            'pageContext' => 'detail'
        ]));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $ormawa = Ormawa::with('user')->find($id);

        if (!$ormawa) {
            return redirect()->route('ormawa.index')->with('error', 'Ormawa not found.');
        }

        return view('ormawa.ormawa', [
            'pageContext' => 'edit',
            'mode' => '',
            'ormawa' => $ormawa, 
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'nama_ormawa' => 'required|string',
            'email' => 'required|email',
            'password' => 'nullable|min:8',
            'tahun_periode' => 'required',
            'ketua_ormawa' => 'nullable|string',
            'wakil_ketua' => 'string|nullable',
            'bendahara' => 'string|nullable',
            'sekretaris' => 'string|nullable',
            'ketua_pengawas' => 'string|nullable',
            'fakultas' => 'string|nullable',
            'alamat' => 'string|nullable',
            'no_telp' => 'string|nullable',
            'profile_img' => 'nullable|image|mimes:jpeg,png,jpg,gif', 
        ]);
    
        $ormawa = Ormawa::find($id);
    
        if (!$ormawa) {
            return redirect()->route('ormawa.index')->with('error', 'Ormawa not found.');
        }
    
        $user = $ormawa->user;
        $user->email = $validatedData['email'];
        $user->name = $validatedData['nama_ormawa'];

        if ($request->hasFile('profile_img')) {
            $profileImage = $request->file('profile_img');
            $imageName = 'profile_' . time() . '.' . $profileImage->getClientOriginalExtension();
            $profileImage->move(public_path('profile_images'), $imageName);
            $user->profile_img = 'profile_images/' . $imageName;
        }
    
        if (!empty($validatedData['password'])) {
            $user->password = Hash::make($validatedData['password']);
        }
    
        $ormawa->update([
            'nama_ormawa' => $validatedData['nama_ormawa'],
            'tahun_periode' => $validatedData['tahun_periode'],
            'ketua' => $validatedData['ketua_ormawa'],
            'wakil' => $validatedData['wakil_ketua'],
            'bendahara' => $validatedData['bendahara'],
            'sekretaris' => $validatedData['sekretaris'],
            'ketua_pengawas' => $validatedData['ketua_pengawas'],
            'fakultas' => $validatedData['fakultas'],
            'alamat' => $validatedData['alamat'],
            'no_telp' => $validatedData['no_telp'],
        ]);
    
        $ormawa->push();
        $user->push();

        if($request->input('mode') == 'profile'){
            session('u_data')->user_name = $user->name;
            session('u_data')->user_profile_img = $user->profile_img;
            return redirect()->route('profile');
        }
    
        return redirect()->route('ormawa.index')->with('success', 'Ormawa updated successfully.');
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $ormawa = Ormawa::find($id);
    
        if (!$ormawa) {
            return redirect()->route('ormawa.index')->with('error', 'Ormawa not found.');
        }
    
        // Assuming you want to delete associated user as well
        $ormawa->user->delete();
        $ormawa->delete();
    
        return redirect()->route('ormawa.index')->with('success', 'Ormawa deleted successfully.');
    }
}
