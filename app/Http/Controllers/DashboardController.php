<?php

namespace App\Http\Controllers;

use App\Models\Departemen;
use App\Models\Ormawa;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index_departemen(){

    }

    public function index_ormawa(){
        
    }


    public function index_superadmin(){
        
    }


    public function index()
    {
        $user = session('u_data');
        $dari_ormawa = null;
        $widget_value = (object) [];

        if ($user->user_role == 1) {
            $widget_value->w1 = 0;
            $widget_value->w2 = 0;
            $widget_value->w3 = 0;
            $widget_value->w4 = 0;
            $widget_value->w5 = 0;
            $widget_value->w6 = 0;
        }
    
        if ($user->user_role == 2) {
            $ormawa = Ormawa::where('user_id', $user->user_id)->first();
            $widget_value->w1 = Departemen::where('ormawa_id', $ormawa->id)->count();
            $widget_value->w2 = 0;
            $widget_value->w3 = 0;
            $widget_value->w4 = 0;
            $widget_value->w5 = 0;
            $widget_value->w6 = 0;
        }
    
        if ($user->user_role == 3) {
            $departemen = Departemen::where('user_id', $user->user_id)->first();
            $dari_ormawa = Ormawa::find($departemen->ormawa_id)->nama_ormw;
            $widget_value->w1 = 0;
            $widget_value->w2 = 0;
            $widget_value->w3 = 0;
            $widget_value->w4 = 0;
            $widget_value->w5 = 0;
            $widget_value->w6 = 0;
        }

        return view('dashboard.index', with(['user' => $user, 'role' => $user->user_role, 'dari_ormawa' => $dari_ormawa, 'widget_val' => $widget_value]));
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
    public function show(string $role)
    {

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
