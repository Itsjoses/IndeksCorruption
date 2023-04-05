<?php

namespace App\Http\Controllers;

use App\Models\Indicator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
class IndicatorController extends Controller
{

    public function show($_, $__, $indicator){
        $indicator = Indicator::find($indicator);
        return view('surveys.indicator-management', ["indicator" => $indicator]);
    }

    public function store($_, $dimension, Request $request){
        $validation = [
            'name' => ['required'],
        ];

        $validator = Validator::make($request->all(), $validation);

        if($validator->fails()){
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $indicator = new Indicator;
        $indicator->name = $request->name;
        $indicator->dimension_id = $dimension;
        $indicator->save();

        return redirect()->back()->with("success", "Successfully created new indicator");
    }

    public function update($_, $__, $indicator, Request $request){
        $indicator = Indicator::find($indicator);
        $indicator->name = $request->input_data;
        $indicator->save();

        $request->session()->flash('success', "Successfully update indicator");
        return response()->json(['success' => true]);
    }

    //
    public function destroy($_, $__, $indicator){
        Indicator::destroy($indicator);
        return redirect()->back()->with("success", "Successfully delete indicator");
    }
}
