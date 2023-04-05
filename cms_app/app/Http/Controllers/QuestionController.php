<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class QuestionController extends Controller
{
    //
    public function store($_, $__, $indicator, Request $request){
        $validation = [
            'name' => ['required'],
        ];

        $validator = Validator::make($request->all(), $validation);

        if($validator->fails()){
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $question = new Question;
        $question->name = $request->name;
        $question->indicator_id = $indicator;
        $question->save();

        return redirect()->back()->with("success", "Successfully created new question");
    }

    public function update($_, $__, $___, $question, Request $request){
        $question = Question::find($question);
        $question->name = $request->input_data["question_name"];

        if($request->input_data["leftmost_parameter"]){
            $question->leftmost_parameter = $request->input_data["leftmost_parameter"];
        }

        if($request->input_data["rightmost_parameter"]){
            $question->rightmost_parameter = $request->input_data["rightmost_parameter"];
        }

        $question->save();

        $request->session()->flash('success', "Successfully update question");
        return response()->json(['success' => true]);
    }

    //
    public function destroy($_, $__, $___, $question){
        Question::destroy($question);
        return redirect()->back()->with("success", "Successfully delete question");
    }
}
