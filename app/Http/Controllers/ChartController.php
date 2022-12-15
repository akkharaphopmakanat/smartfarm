<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ReportHistory;

class ChartController extends Controller
{
    public function index()
    {
        $users = ReportHistory::where('plant_id','plant1')->pluck('moise','created_at');
        $labels = $users->keys();
        $data = $users->values();

        $users2 = ReportHistory::where('plant_id','plant2')->pluck('moise','created_at');
        $labels2 = $users2->keys();
        $data2 = $users2->values();

        $users3 = ReportHistory::where('plant_id','plant3')->pluck('moise','created_at');
        $labels3 = $users3->keys();
        $data3 = $users3->values();

        $users4 = ReportHistory::where('plant_id','plant4')->pluck('moise','created_at');
        $labels4 = $users4->keys();
        $data4 = $users4->values();

        $users5 = ReportHistory::where('plant_id','plant5')->pluck('moise','created_at');
        $labels5 = $users5->keys();
        $data5 = $users5->values();

        $users6 = ReportHistory::where('plant_id','plant1')->pluck('temp','created_at');
        $lab_temp = $users6->keys();
        $lab_data = $users6->values();

        $users7 = ReportHistory::where('plant_id','plant1')->pluck('hum','created_at');
        $env_temp = $users7->keys();
        $env_data = $users7->values();
    
    return view('chart', compact('labels','data','labels2','data2','labels3','data3','labels4','data4','labels5','data5','lab_temp','lab_data','env_temp','env_data')); 
    }
    
}
