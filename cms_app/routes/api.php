<?php

use App\Models\Answer;
use App\Models\Dimension;
use App\Models\Response;
use App\Models\Province;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get("answers", function(Request $request){
    if($request["dimension_id"]){
        $dimension = Dimension::find($request["dimension_id"]);
        $questions = $dimension->questions()->select("questions.id");
        $answers = Answer::orWhereIn("question_id", $questions)->get();
        return response()->json($answers);
    }
    else if($request["province_id"]){
        $province = Province::find($request["province_id"]);
        $cities = $province->cities()->select("cities.id");
        $responses = Response::orWhereIn("city_id", $cities)->select("responses.id");
        $answers = Answer::orWhereIn("response_id", $responses)->join("questions","questions.id","=","answers.question_id")->get();
        // dd($answers);
        return response()->json($answers);
    }
    
});