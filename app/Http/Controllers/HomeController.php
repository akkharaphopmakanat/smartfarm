<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\systemcontrol;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    //public function __construct()
    //{
    //    $this->middleware('auth');
    //}

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        
        return view('home');
    }

    public function controller(Request $request)

    {
        $key = $request->wish;
        if($key == 1){
            $fielddata=systemcontrol::where('id',1)->get()->first();
            $fielddata->update(array('relay' => '1'));
            $fielddata->save();
        }
        else
        {
            $fielddata=systemcontrol::where('id',1)->get()->first();
            $fielddata->update(array('relay' => '0'));
            $fielddata->save();
        }

        $relay = systemcontrol::where('id',1)->get()->first();
        if($relay->relay == 0){
            $wish = 1;
            $color = "red";
        }
        else{
            $wish = 0;
            $color = "green";
        }
        return view('button',['wish' => $wish , 'color'=>$color]);
    }
}
