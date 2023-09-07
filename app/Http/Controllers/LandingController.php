<?php

namespace App\Http\Controllers;

use App\Models\Kalender;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function landing_page(){
        $kalenders = Kalender::all();


        return view('landing-page', with([
            'kalenders' => $kalenders
        ]));
    }
}
