<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\fielddata;

class FieldView extends Controller
{
    public function index(Request $request,$plant_id)
    {
        $plantdata = fielddata::where('plant_id',$plant_id)->get()->first();;
        return view('detail',[
        'plant_id'=>$plant_id,
        'plantdata'=>$plantdata
    ]);
    }
}
