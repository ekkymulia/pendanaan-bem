<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrmawaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('ormawa.data-ormawa');
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
        //
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
        return view('ormawa.ormawa', with([
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
