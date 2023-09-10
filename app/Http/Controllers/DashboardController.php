<?php

namespace App\Http\Controllers;

use App\Models\DanaRab;
use App\Models\DanaRiil;
use App\Models\Departemen;
use App\Models\Ormawa;
use App\Models\Proker;
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


    public function print(){
        $user = session('u_data');
        $dari_ormawa = null;
        $widget_value = (object) [];
        $chartData = (object) [];

        if ($user->user_role == 1) {
            $widget_value->w1 = Ormawa::count();
            $widget_value->w2 = Proker::where('tipe_dana_id', 1)->count();
            $widget_value->w3 = Proker::where('tipe_dana_id', 2)->count();
            $widget_value->w4 = Proker::where('tipe_dana_id', 2)->sum('dana');
            $widget_value->w5 = Proker::where('tipe_dana_id', 1)->sum('dana');
            $widget_value->w6 = Proker::sum('dana');

            $chartData->currentYear = $currentYear = date('Y');
            $chartData->chartName1 = 'Total Dana Yang Belum Diberikan';
            
            $chartData->chartName2 = '';
            $chartData->chartDataVal2 = [];


            $chartCategories = Ormawa::with('departements.prokers')->get();

            foreach($chartCategories as $cc){
                $chartData->chartCategories[]= $cc->user->name;
            }

            $chartData->wc1 = 0;

            foreach ($chartCategories as $ormawa) {
                $chartDataVal = 0;

                foreach ($ormawa->departements as $departemen) {
                    foreach ($departemen->prokers as $proker) {
                        $danaRabTotal = DanaRab::where('proker_id', $proker->id)->sum('total_harga');
                        $danaRiilTotal = DanaRiil::where('proker_id', $proker->id)->sum('total_harga');

                        // Calculate the net value for the project
                        $netValue = $danaRabTotal - $danaRiilTotal;

                        // Add the net value to the total net value for the ORMawa
                        $chartData->wc1 += $netValue;
                        $chartDataVal += $netValue;

                        // You can access the net value for each project as $netValue
                        // and the total net value for the ORMawa as $ormawa->totalNetValue
                    }
                }
                $chartData->chartDataVal[] = $chartDataVal ?? 0;
            }

            $totalProker = Proker::count();

            $approvedProkerCount = Proker::
                where('status_id', 1)
                ->count();

            // Calculate the percentage
            if ($totalProker > 0) {
                $chartData->cd2 = ($approvedProkerCount / $totalProker) * 100;
            } else {
                // Handle the case where there are no Proker to avoid division by zero
                $chartData->cd2 = 0;
            }

        }
    
        if ($user->user_role == 2) {
            $ormawa = Ormawa::where('user_id', $user->user_id)->first();
            $widget_value->w1 = Departemen::where('ormawa_id', $ormawa->id)->count();
            $widget_value->w2 = Proker::whereHas('departemen', function ($query) use ($ormawa) {
                $query->where('ormawa_id', $ormawa->id);
            })->count();
            $widget_value->w3 = Proker::whereHas('departemen', function ($query) use ($ormawa) {
                $query->where('ormawa_id', $ormawa->id);
            })->where('status_id', 3)->count();
            $widget_value->w4 = Proker::whereHas('departemen', function ($query) use ($ormawa) {
                $query->where('ormawa_id', $ormawa->id);
            })->where('status_id', 1)->sum('dana');
            $widget_value->w5 = Proker::whereHas('departemen', function ($query) use ($ormawa) {
                $query->where('ormawa_id', $ormawa->id);
            })->where('status_id', 2)->count();
            $widget_value->w6 = Proker::whereHas('departemen', function ($query) use ($ormawa) {
                $query->where('ormawa_id', $ormawa->id);
            })->where('status_id', 1)->count();

            // Generate chart categories for current year
            $chartData->currentYear = $currentYear = date('Y');

            $chartCategories = Departemen::with('user')->where('ormawa_id', $ormawa->id)->get();

            $chartData->chartName1 = 'Proker Terlaksana';
            $chartData->chartName2 = 'Proker Belum Terlaksana';
            
            $chartData->chartDataVal = [];
            $chartData->chartDataVal2 = [];

            foreach($chartCategories as $cc){
                $chartData->chartCategories[]= $cc->user->name;
            }

            $chartData->wc1 = $chartCategories->count();
            $chartData->wc2 = 0;
            $chartData->wc3 = 0;

            foreach ($chartCategories as $category) {
                $departemenId = $category->id;
                $chartDataVal = Proker::where('departemen_id', $category->id)
                ->where('status_id', 1)
                ->whereHas('departemen', function ($query) use ($departemenId, $currentYear) {
                    $query->where('id', $departemenId)
                          ->where('tahun_periode', $currentYear);
                })
                ->count();
                
                // $chartData->wc1 += $chartDataVal;
                $chartData->wc2 += $chartDataVal;

                $chartDataVal2 = Proker::where('departemen_id', $category->id)
                ->where('status_id', 3)
                ->whereHas('departemen', function ($query) use ($departemenId, $currentYear) {
                    $query->where('id', $departemenId)
                          ->where('tahun_periode', $currentYear);
                })
                ->count();

                // $chartData->wc1 += $chartDataVal2;
                $chartData->wc3 += $chartDataVal2;
            
                $chartData->chartDataVal[] = $chartDataVal ?? 0;
                $chartData->chartDataVal2[] = $chartDataVal2 ?? 0;
            }

            $totalProker = Proker::whereHas('departemen', function ($query) use ($ormawa) {
                $query->where('ormawa_id', $ormawa->id);
            })->count();

            $approvedProkerCount =  Proker::whereHas('departemen', function ($query) use ($ormawa) {
                $query->where('ormawa_id', $ormawa->id);
            })->where('status_id', 1)->count();

            if ($totalProker > 0) {
                $chartData->cd2 = ($approvedProkerCount / $totalProker) * 100;
            } else {
                $chartData->cd2 = 0;
            }

        }
    
        if ($user->user_role == 3) {
            $departemen = Departemen::where('user_id', $user->user_id)->first();
            $dari_ormawa = Ormawa::find($departemen->ormawa_id)->nama_ormw;
        
            $widget_value->w1 = Proker::where('departemen_id', $departemen->id)->where('tipe_dana_id', 1)->count();
            $widget_value->w2 = Proker::where('departemen_id', $departemen->id)->where('tipe_dana_id', 2)->count();
            $widget_value->w3 = Proker::where('departemen_id', $departemen->id)->where('status_id', 1)->count();
            $widget_value->w4 = Proker::where('departemen_id', $departemen->id)->where('status_id', 1)->sum('dana');
            // $widget_value->w5 = Proker::where('departemen_id', $departemen->id)->where('status_id', 3)->count();
            $widget_value->w6 = Proker::where('departemen_id', $departemen->id)->where('status_id', 3)->count();

            
            $chartData->chartName1 = 'Dana belum diterima';
            $chartData->chartName2 = 'Dana sudah diterima';

            // Generate chart categories for current year
            $chartData->currentYear = $currentYear = date('Y');

            $chartCategories = Proker::join('departemens', 'prokers.departemen_id', '=', 'departemens.id')
            ->where('departemens.user_id', $user->user_id)
            ->where('departemens.tahun_periode', $currentYear)
            ->pluck('prokers.nama');

            $chartData->wc1 = $chartCategories->count();

            foreach($chartCategories as $cc){
                $chartData->chartCategories[]= $cc;
            }
            
            $chartData->chartDataVal = [];
            $chartData->chartDataVal2 = [];

            $widget_value->w5 = $chartData->wc2 = 0;
            $chartData->wc3 = 0;
            
            foreach ($chartCategories as $category) {
                // Find data for chartDataVal
                $chartDataVal = DanaRab::with(['proker.departemen'])
                    ->selectRaw('dana_rabs.proker_id, SUM(dana_rabs.total_harga) as total_harga')
                    ->join('prokers', 'dana_rabs.proker_id', '=', 'prokers.id')
                    ->join('departemens', 'prokers.departemen_id', '=', 'departemens.id')
                    ->where('departemens.user_id', $user->user_id)
                    ->where('departemens.tahun_periode', $currentYear)
                    ->where('prokers.nama', $category)
                    ->groupBy('dana_rabs.proker_id')
                    ->value('total_harga');

                $chartData->wc2 += $chartDataVal;
                $widget_value->w5 += $chartDataVal;
            
                // Find data for chartDataVal2
                $chartDataVal2 = DanaRiil::with(['proker.departemen'])
                    ->selectRaw('dana_riils.proker_id, SUM(dana_riils.total_harga) as total_harga')
                    ->join('prokers', 'dana_riils.proker_id', '=', 'prokers.id')
                    ->join('departemens', 'prokers.departemen_id', '=', 'departemens.id')
                    ->where('departemens.user_id', $user->user_id)
                    ->where('departemens.tahun_periode', $currentYear)
                    ->where('prokers.nama', $category)
                    ->groupBy('dana_riils.proker_id')
                    ->value('total_harga');

                $chartData->wc3 += $chartDataVal2;
            
                // If no data found, set the value to 0
                $chartData->chartDataVal[] = $chartDataVal ?? 0;
                $chartData->chartDataVal2[] = $chartDataVal2 ?? 0;
            }

            $totalProker = Proker::where('departemen_id', $departemen->id)->count();

            $approvedProkerCount = Proker::where('departemen_id', $departemen->id)
                ->where('status_id', 1)
                ->count();

            // Calculate the percentage
            if ($totalProker > 0) {
                $chartData->cd2 = ($approvedProkerCount / $totalProker) * 100;
            } else {
                // Handle the case where there are no Proker to avoid division by zero
                $chartData->cd2 = 0;
            }

        }
        $departemens = Departemen::with('user')->get();

        return view('dashboard.print', with(['departemens'=> $departemens, 'user' => $user, 'role' => $user->user_role, 'dari_ormawa' => $dari_ormawa, 'widget_val' => $widget_value, 'chartDatas' => $chartData]));
    }


    public function index()
    {
        $user = session('u_data');
        $dari_ormawa = null;
        $widget_value = (object) [];
        $chartData = (object) [];

        if ($user->user_role == 1) {
            $widget_value->w1 = Ormawa::count();
            $widget_value->w2 = Proker::where('tipe_dana_id', 1)->count();
            $widget_value->w3 = Proker::where('tipe_dana_id', 2)->count();
            $widget_value->w4 = Proker::where('tipe_dana_id', 2)->sum('dana');
            $widget_value->w5 = Proker::where('tipe_dana_id', 1)->sum('dana');
            $widget_value->w6 = Proker::sum('dana');

            $chartData->currentYear = $currentYear = date('Y');
            $chartData->chartName1 = 'Total Dana Yang Belum Diberikan';
            
            $chartData->chartName2 = '';
            $chartData->chartDataVal2 = [];


            $chartCategories = Ormawa::with('departements.prokers')->get();

            foreach($chartCategories as $cc){
                $chartData->chartCategories[]= $cc->user->name;
            }

            $chartData->wc1 = 0;

            foreach ($chartCategories as $ormawa) {
                $chartDataVal = 0;

                foreach ($ormawa->departements as $departemen) {
                    foreach ($departemen->prokers as $proker) {
                        $danaRabTotal = DanaRab::where('proker_id', $proker->id)->sum('total_harga');
                        $danaRiilTotal = DanaRiil::where('proker_id', $proker->id)->sum('total_harga');

                        // Calculate the net value for the project
                        $netValue = $danaRabTotal - $danaRiilTotal;

                        // Add the net value to the total net value for the ORMawa
                        $chartData->wc1 += $netValue;
                        $chartDataVal += $netValue;

                        // You can access the net value for each project as $netValue
                        // and the total net value for the ORMawa as $ormawa->totalNetValue
                    }
                }
                $chartData->chartDataVal[] = $chartDataVal ?? 0;
            }

            $totalProker = Proker::count();

            $approvedProkerCount = Proker::
                where('status_id', 1)
                ->count();

            // Calculate the percentage
            if ($totalProker > 0) {
                $chartData->cd2 = ($approvedProkerCount / $totalProker) * 100;
            } else {
                // Handle the case where there are no Proker to avoid division by zero
                $chartData->cd2 = 0;
            }

        }
    
        if ($user->user_role == 2) {
            $ormawa = Ormawa::where('user_id', $user->user_id)->first();
            $widget_value->w1 = Departemen::where('ormawa_id', $ormawa->id)->count();
            $widget_value->w2 = Proker::whereHas('departemen', function ($query) use ($ormawa) {
                $query->where('ormawa_id', $ormawa->id);
            })->count();
            $widget_value->w3 = Proker::whereHas('departemen', function ($query) use ($ormawa) {
                $query->where('ormawa_id', $ormawa->id);
            })->where('status_id', 3)->count();
            $widget_value->w4 = Proker::whereHas('departemen', function ($query) use ($ormawa) {
                $query->where('ormawa_id', $ormawa->id);
            })->where('status_id', 1)->sum('dana');
            $widget_value->w5 = Proker::whereHas('departemen', function ($query) use ($ormawa) {
                $query->where('ormawa_id', $ormawa->id);
            })->where('status_id', 2)->count();
            $widget_value->w6 = Proker::whereHas('departemen', function ($query) use ($ormawa) {
                $query->where('ormawa_id', $ormawa->id);
            })->where('status_id', 1)->count();

            // Generate chart categories for current year
            $chartData->currentYear = $currentYear = date('Y');

            $chartCategories = Departemen::with('user')->where('ormawa_id', $ormawa->id)->get();

            $chartData->chartName1 = 'Proker Terlaksana';
            $chartData->chartName2 = 'Proker Belum Terlaksana';
            
            $chartData->chartDataVal = [];
            $chartData->chartDataVal2 = [];

            foreach($chartCategories as $cc){
                $chartData->chartCategories[]= $cc->user->name;
            }

            $chartData->wc1 = $chartCategories->count();
            $chartData->wc2 = 0;
            $chartData->wc3 = 0;

            foreach ($chartCategories as $category) {
                $departemenId = $category->id;
                $chartDataVal = Proker::where('departemen_id', $category->id)
                ->where('status_id', 1)
                ->whereHas('departemen', function ($query) use ($departemenId, $currentYear) {
                    $query->where('id', $departemenId)
                          ->where('tahun_periode', $currentYear);
                })
                ->count();
                
                // $chartData->wc1 += $chartDataVal;
                $chartData->wc2 += $chartDataVal;

                $chartDataVal2 = Proker::where('departemen_id', $category->id)
                ->where('status_id', 3)
                ->whereHas('departemen', function ($query) use ($departemenId, $currentYear) {
                    $query->where('id', $departemenId)
                          ->where('tahun_periode', $currentYear);
                })
                ->count();

                // $chartData->wc1 += $chartDataVal2;
                $chartData->wc3 += $chartDataVal2;
            
                $chartData->chartDataVal[] = $chartDataVal ?? 0;
                $chartData->chartDataVal2[] = $chartDataVal2 ?? 0;
            }

            $totalProker = Proker::whereHas('departemen', function ($query) use ($ormawa) {
                $query->where('ormawa_id', $ormawa->id);
            })->count();

            $approvedProkerCount =  Proker::whereHas('departemen', function ($query) use ($ormawa) {
                $query->where('ormawa_id', $ormawa->id);
            })->where('status_id', 1)->count();

            if ($totalProker > 0) {
                $chartData->cd2 = ($approvedProkerCount / $totalProker) * 100;
            } else {
                $chartData->cd2 = 0;
            }

        }
    
        if ($user->user_role == 3) {
            $departemen = Departemen::where('user_id', $user->user_id)->first();
            $dari_ormawa = Ormawa::find($departemen->ormawa_id)->nama_ormw;
        
            $widget_value->w1 = Proker::where('departemen_id', $departemen->id)->where('tipe_dana_id', 1)->count();
            $widget_value->w2 = Proker::where('departemen_id', $departemen->id)->where('tipe_dana_id', 2)->count();
            $widget_value->w3 = Proker::where('departemen_id', $departemen->id)->where('status_id', 1)->count();
            $widget_value->w4 = Proker::where('departemen_id', $departemen->id)->where('status_id', 1)->sum('dana');
            // $widget_value->w5 = Proker::where('departemen_id', $departemen->id)->where('status_id', 3)->count();
            $widget_value->w6 = Proker::where('departemen_id', $departemen->id)->where('status_id', 3)->count();

            
            $chartData->chartName1 = 'Dana belum diterima';
            $chartData->chartName2 = 'Dana sudah diterima';

            // Generate chart categories for current year
            $chartData->currentYear = $currentYear = date('Y');

            $chartCategories = Proker::join('departemens', 'prokers.departemen_id', '=', 'departemens.id')
            ->where('departemens.user_id', $user->user_id)
            ->where('departemens.tahun_periode', $currentYear)
            ->pluck('prokers.nama');

            $chartData->wc1 = $chartCategories->count();

            foreach($chartCategories as $cc){
                $chartData->chartCategories[]= $cc;
            }
            
            $chartData->chartDataVal = [];
            $chartData->chartDataVal2 = [];

            $widget_value->w5 = $chartData->wc2 = 0;
            $chartData->wc3 = 0;
            
            foreach ($chartCategories as $category) {
                // Find data for chartDataVal
                $chartDataVal = DanaRab::with(['proker.departemen'])
                    ->selectRaw('dana_rabs.proker_id, SUM(dana_rabs.total_harga) as total_harga')
                    ->join('prokers', 'dana_rabs.proker_id', '=', 'prokers.id')
                    ->join('departemens', 'prokers.departemen_id', '=', 'departemens.id')
                    ->where('departemens.user_id', $user->user_id)
                    ->where('departemens.tahun_periode', $currentYear)
                    ->where('prokers.nama', $category)
                    ->groupBy('dana_rabs.proker_id')
                    ->value('total_harga');

                $chartData->wc2 += $chartDataVal;
                $widget_value->w5 += $chartDataVal;
            
                // Find data for chartDataVal2
                $chartDataVal2 = DanaRiil::with(['proker.departemen'])
                    ->selectRaw('dana_riils.proker_id, SUM(dana_riils.total_harga) as total_harga')
                    ->join('prokers', 'dana_riils.proker_id', '=', 'prokers.id')
                    ->join('departemens', 'prokers.departemen_id', '=', 'departemens.id')
                    ->where('departemens.user_id', $user->user_id)
                    ->where('departemens.tahun_periode', $currentYear)
                    ->where('prokers.nama', $category)
                    ->groupBy('dana_riils.proker_id')
                    ->value('total_harga');

                $chartData->wc3 += $chartDataVal2;
            
                // If no data found, set the value to 0
                $chartData->chartDataVal[] = $chartDataVal ?? 0;
                $chartData->chartDataVal2[] = $chartDataVal2 ?? 0;
            }

            $totalProker = Proker::where('departemen_id', $departemen->id)->count();

            $approvedProkerCount = Proker::where('departemen_id', $departemen->id)
                ->where('status_id', 1)
                ->count();

            // Calculate the percentage
            if ($totalProker > 0) {
                $chartData->cd2 = ($approvedProkerCount / $totalProker) * 100;
            } else {
                // Handle the case where there are no Proker to avoid division by zero
                $chartData->cd2 = 0;
            }

        }
        $departemens = Departemen::with('user')->get();

        return view('dashboard.index', with(['departemens'=> $departemens, 'user' => $user, 'role' => $user->user_role, 'dari_ormawa' => $dari_ormawa, 'widget_val' => $widget_value, 'chartDatas' => $chartData]));
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
