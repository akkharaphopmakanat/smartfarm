<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\fielddata;

class MainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return fielddata::all();
    }

    public function store(Request $request)
    {
        return fielddata::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($plant_id)
    {
        return fielddata::where('plant_id',$plant_id)->get()->first();
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$plant_id)
    {

        $fielddata=fielddata::where('plant_id',$plant_id)->get()->first();
        $fielddata->update($request->all());
        $fielddata->save();
        return $fielddata;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $final = fielddata::findOrFail($id);
        if($final){
            fielddata::destroy($id);
        }
        else{
            return response()->json(error);
        }
        return response()->json(null); 
    }
}
