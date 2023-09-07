<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SuperadminController extends Controller
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
        // Validate the input data as needed
        $validatedData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email,' . $id, 
            'password' => 'nullable|string|min:6', 
            'profile_img' => 'nullable|image|mimes:jpeg,png,jpg,gif', 
        ]);

        // Find the Superadmin user by ID
        $superadmin = User::find($id);

        if (!$superadmin) {
            return redirect()->route('superadmin.index')->with('error', 'Superadmin not found.');
        }

        $superadmin->name = $validatedData['name'];
        $superadmin->email = $validatedData['email'];

        if (!empty($validatedData['password'])) {
            $superadmin->password = Hash::make($validatedData['password']);
        }

        if ($request->hasFile('profile_img')) {
            $profileImage = $request->file('profile_img');
            $imageName = 'profile_' . time() . '.' . $profileImage->getClientOriginalExtension();
            $profileImage->move(public_path('profile_images'), $imageName);
            $superadmin->profile_img = 'profile_images/' . $imageName;
        }

        if (!empty($validatedData['password'])) {
            $superadmin->password = Hash::make($validatedData['password']);
        }
    
        // Save the changes
        $superadmin->save();

        return redirect()->route('superadmin.index')->with('success', 'Superadmin updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
