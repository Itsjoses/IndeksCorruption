<?php

namespace App\Http\Controllers;

use App\Models\Dimension;
use App\Models\Survey;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class DimensionController extends Controller
{
    //
    public function show($survey, $dimension){
        $dimension = Dimension::find($dimension);
        return view('surveys.dimension-management', ["dimension" => $dimension]);
    }

    public function store($survey, Request $request){
        $validation = [
            'dimension_name' => ['required'],
        ];

        $validator = Validator::make($request->all(), $validation);

        if($validator->fails()){
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $dimension = new Dimension;
        $dimension->name = $request->dimension_name;
        $survey = Survey::where("year", "=", $survey)->first();
        $dimension->survey_id = $survey->id;
        $dimension->save();

        return redirect()->back()->with("success", "Successfully created new dimension");
    }

    public function update($_, $dimension, Request $request){
        // $validation = [
        //     'dimension_name' => ['required'],
        // ];

        // $validator = Validator::make($request->all(), $validation);

        // if($validator->fails()){
        //     return redirect()->back()->withInput()->withErrors($validator);
        // }

        $dimension = Dimension::find($dimension);
        $dimension->name = $request->input_data;
        $dimension->save();
        $request->session()->flash('success', "Successfully update dimension");
        return response()->json(['success' => true]);
    }

    public function destroy($survey, $dimension){
        Dimension::destroy($dimension);
        return redirect()->back()->with("success", "Successfully delete dimension");
    }
}
