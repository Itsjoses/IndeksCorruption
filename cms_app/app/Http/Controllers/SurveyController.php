<?php

namespace App\Http\Controllers;

use App\Models\Dimension;
use App\Models\Survey;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class SurveyController extends Controller
{
    //
    public function show($survey){
        $survey = Survey::where("year", "=", $survey)->first();
        return view('surveys.survey-management', ["survey" => $survey]);
    }

    public function store(Request $request){
        $year = $request->input_data["year"];
        if($request->input_data["selected"] == "duplicate"){
            $previous_survey = Survey::latest('created_at')->first();
            $newsurvey = $previous_survey->replicate();
            $newsurvey->year = $year;
            $newsurvey->push();
            foreach ($previous_survey->dimensions as $dimension) {
                $copy = $dimension->replicate();
                $newsurvey->dimensions()->save($copy);

                foreach ($dimension->indicators as $indicator) {
                    $indicatorCopy = $indicator->replicate();
                    $copy->indicators()->save($indicatorCopy);

                    foreach ($indicator->questions as $question) {
                        $questionCopy = $question->replicate();
                        $indicatorCopy->questions()->save($questionCopy);
                    }
                }
            }
        }
        else{
            $newsurvey = new Survey;
            $newsurvey->year = $year;
            $newsurvey->createdAt = Carbon::now()->toDateTimeString();
            $newsurvey->updatedAt = Carbon::now()->toDateTimeString();
            $newsurvey->save();
        }
        $request->session()->flash('success', "Successfully created new survey");
        return response()->json(['success' => true]);
    }

    public function destroy($survey){
        Survey::destroy($survey);
        return redirect("/")->with("success", "Successfully delete survey");
    }

}
