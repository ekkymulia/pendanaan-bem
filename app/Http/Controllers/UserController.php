<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $user = User::find($id);

        if (!$user) {
            return ['success' => false, 'message' => 'User not found.'];
        }

        // Validate and update user data
        $validatedData = $request->validate([
            'nama_superadmin' => 'required',
            'email' => 'required|email',
            'password' => 'nullable',
            'profile_img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', 
        ]);

        $user->name = $validatedData['nama_superadmin'];
        $user->email = $validatedData['email'];

        // Update password if provided
        if (!empty($validatedData['password'])) {
            $user->password = Hash::make($validatedData['password']);
        }

        if ($request->hasFile('profile_img')) {
            $profileImage = $request->file('profile_img');
            $imageName = 'profile_' . time() . '.' . $profileImage->getClientOriginalExtension();
            $profileImage->move(public_path('profile_images'), $imageName);
            $user->profile_img = 'profile_images/' . $imageName;
        }

        $user->save();

        if($request->input('mode') == 'profile'){
            session('u_data')->user_name = $user->name;
            session('u_data')->user_profile_img = $user->profile_img;
            return redirect()->route('profile');
        }

        return ['success' => true, 'message' => 'User updated successfully.'];
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
