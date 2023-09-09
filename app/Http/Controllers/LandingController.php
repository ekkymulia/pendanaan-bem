<?php

namespace App\Http\Controllers;

use App\Models\Departemen;
use App\Models\Kalender;
use App\Models\Ormawa;
use App\Models\Proker;
use App\Models\User;

class LandingController extends Controller
{
    public function landing_page()
    {
        $kalenders = Kalender::all();
        $countOrmawa = Ormawa::count();
        $countDpt = Departemen::count();
        $countProker = Proker::count();

        $ormawaWithDepartemen = Ormawa::with('departements')->get();
        $omwsAndDpts = $ormawaWithDepartemen->map(function ($ormawa) {
            return [
                'nama' => $ormawa->user->name,
                'departemens' => $ormawa->departements->map(function ($departemen) {
                    return [
                        'nama' => $departemen->user->name,
                        'deskripsi' => $departemen->deskripsi_departemen
                    ];
                })
            ];
        });

        // return response()->json($omwsAndDpts);

        return view('landing-page', with([
            'kalenders' => $kalenders,
            'countOrmawa' => $countOrmawa,
            'countDpt' => $countDpt,
            'countProker' => $countProker,
            'omwsAndDpts' => $omwsAndDpts
        ]));
    }
}
