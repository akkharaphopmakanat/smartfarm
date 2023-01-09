<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ReportHistory;
use App\Models\fielddata;

class ChartController extends Controller


{

    public function index($duration, Request $request)
    {
        //$plantdata = fielddata::where('plant_id','plant1')->get()->first();
        $plantdata = fielddata::all();
        
        $numbers = $duration*24;
        $users = ReportHistory::where('plant_id','plant1')->orderBy("id", "DESC")->take($numbers)->pluck('moise','created_at');
        $users = $users->reverse();
        $labels = $users->keys();
        $data = $users->values();

        $users2 = ReportHistory::where('plant_id','plant2')->orderBy("id", "DESC")->take($numbers)->pluck('moise','created_at');
        $users2 = $users2->reverse();
        $labels2 = $users2->keys();
        $data2 = $users2->values();

        $users3 = ReportHistory::where('plant_id','plant3')->orderBy("id", "DESC")->take($numbers)->pluck('moise','created_at');
        $users3 = $users3->reverse();
        $labels3 = $users3->keys();
        $data3 = $users3->values();

        $users4 = ReportHistory::where('plant_id','plant4')->orderBy("id", "DESC")->take($numbers)->pluck('moise','created_at');
        $users4 = $users4->reverse();
        $labels4 = $users4->keys();
        $data4 = $users4->values();

        $users5 = ReportHistory::where('plant_id','plant5')->orderBy("id", "DESC")->take($numbers)->pluck('moise','created_at');
        $users5 = $users5->reverse();
        $labels5 = $users5->keys();
        $data5 = $users5->values();

        $users6 = ReportHistory::where('plant_id','plant1')->orderBy("id", "DESC")->take($numbers)->pluck('temp','created_at');
        $users6 = $users6->reverse();
        $lab_temp = $users6->keys();
        $lab_data = $users6->values();

        $users7 = ReportHistory::where('plant_id','plant1')->orderBy("id", "DESC")->take($numbers)->pluck('hum','created_at');
        $users7 = $users7->reverse();
        $env_temp = $users7->keys();
        $env_data = $users7->values();

        $users8 = ReportHistory::where('plant_id','plant1')->orderBy("id", "DESC")->take($numbers)->pluck('light','created_at');
        $users8 = $users8->reverse();
        $lit_temp = $users8->keys();
        $lit_data = $users8->values();
    
        return view('chart', compact('plantdata','labels','data','labels2','data2','labels3','data3','labels4','data4','labels5','data5','lab_temp','lab_data','env_temp','env_data','lit_temp','lit_data')); 
    }
    
}
