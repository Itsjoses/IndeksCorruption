<?php

namespace App\Http\Controllers\Survey;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SurveyAnswerController extends Controller
{
    //
    public function index(){
        $question = DB::table('questions')->get();
        $users = DB::table('participants')->get();
        $city = DB::table('cities')->get();
//        dd($question);

        return view('Answer.Question',['questions' => $question,'users' => $users,'cities' => $city]);
    }

    public function AnswerDisplay(){

    }

}
