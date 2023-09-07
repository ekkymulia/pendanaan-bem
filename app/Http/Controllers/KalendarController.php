<?php

namespace App\Http\Controllers;

use App\Models\Kalender;
use Illuminate\Http\Request;

class KalendarController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function apiKalender(){
        $kalenders = Kalender::all();
        return response()->json($kalenders);
    }

    public function index()
    {
        $kalenders = Kalender::all();
        return view('kalender.data-kalender', compact('kalenders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kalender.kalender', with([
            'pageContext' => 'add'
        ]));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = session('u_data');

        $validatedData = $request->validate([
            'event_name' => 'required',
            'event_start_date' => 'required|date',
            'event_end_date' => 'required|date',
            'event_description' => 'nullable|string',
            // Add more validation rules as needed
        ]);

        $validatedData['user_id'] = $user->user_id;

        // Create a new Kalender event with the validated data
        $kalender = Kalender::create($validatedData);

        // Redirect to the index page or show the newly created event
        return redirect()->route('kalender.index')->with('success', 'Kalender event created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $kalender = Kalender::findOrFail($id);
        
        return view('kalender.kalender', with([
            'pageContext' => 'add',
            'kalender' => 'kalender'
        ]));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $kalender = Kalender::findOrFail($id);
        
        return view('kalender.kalender', with([
            'pageContext' => 'add',
            'kalender' => 'kalender'
        ]));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = session('u_data');

        $validatedData = $request->validate([
            'event_name' => 'required',
            'event_start_date' => 'required|date',
            'event_end_date' => 'required|date',
            'event_description' => 'nullable|string',
        ]);

        $kalender = Kalender::findOrFail($id);

        $validatedData['user_id'] = $user->user_id;

        $kalender->update($validatedData);

        return redirect()->route('kalender.index')->with('success', 'Kalender event updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kalender = Kalender::findOrFail($id);
        $kalender->delete();
        
        return redirect()->route('kalender.index')->with('success', 'Kalender event deleted successfully.');
    }
}
