<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\DimensionResult;
use App\Models\IndicatorResult;
use App\Models\Response;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class TestingAPI extends Controller
{
    public function submitData(Request $request)
    {
        $question = DB::table('questions')->get();
        $length = count($request->Answer);

        $indikator = DB::table('indicators')->get();




        //indikator
        $indikatorarray = array_fill(0,count($indikator),0);
        $indikatorarraykey = array_fill(0,count($indikator),0);
        for($i=1;$i<=$length;$i++){
            $index = $question[$i-1]->indicator_id -1;
            $indikatorarray[$index] += (double) $request->Answer[$i];
            $indikatorarraykey[$index] += 1;
        }
//        dd($indikatorarraykey);
        for($i=0;$i<count($indikator);$i++){
            $indikatorarray[$i] =  (int) round($indikatorarray[$i]/$indikatorarraykey[$i]);
        }
//        dd($indikatorarray);

        // dimensi
        $dimensi = DB::table('dimensions')->get();
        $dimensionarray = array_fill(0,count($dimensi),0);
        $dimensionarraykey = array_fill(0,count($dimensi),0);

        for($i=0;$i<count($indikator);$i++){
            $index = $indikator[$i]->dimension_id;
            $dimensionarray[$index-1] += (double) $indikatorarray[$i];
            $dimensionarraykey[$index-1] += 1;
        }

        for($i=0;$i<count($dimensi);$i++){
            $dimensionarray[$i] =  (int) round($dimensionarray[$i]/$dimensionarraykey[$i]);
        }

        $url = 'http://localhost:5000/api/submit_data';

        $response = Http::post($url, [
            'pertanyaan1' => $dimensionarray[0],
            'pertanyaan2' => $dimensionarray[1],
            'pertanyaan3' => $dimensionarray[2],
            'pertanyaan4' => $dimensionarray[3],
            'pertanyaan5' => $dimensionarray[4]
        ]);

        $data = json_decode($response->body());

        $prediction = $data->prediction[0];
//        dd($indikatorarray,$dimensionarray,$prediction);
        // Process the data

        $reponses = new Response();

        $reponses->participant_id = $request->input('user_id');
        $reponses->city_id = $request->input('city_id');
        $reponses->survey_id = 2;
        $reponses->corruption_index = $prediction;
        $reponses->save();

        for($i =0;$i<$length;$i++){
            $Answers = new Answer();
            $Answers->response_id = $reponses->id;
            $Answers->question_id = $i+1;
            $Answers->answer_key = $request->Answer[$i+1];
            $Answers->save();
        }


        for($i =0;$i<count($dimensi);$i++){
            $dimensionResult = new DimensionResult();
            $dimensionResult->response_id = $reponses->id;
            $dimensionResult->dimension_id = $i+1;
            $dimensionResult->dimension_index = $dimensionarray[$i];
            $dimensionResult->Save();
        }

        for($i =0;$i<count($indikator);$i++){
            $indicatorResult = new IndicatorResult();
            $indicatorResult->response_id = $reponses->id;
            $indicatorResult->indicator_id = $i+1;
            $indicatorResult->indicator_index = $indikatorarray[$i];
            $indicatorResult->save();
        }

        return view('Answer.testing', ['dimensions' => $dimensionarray,'indikators'=>$indikatorarray,'result'=>$prediction,
            'showindikator'=>$indikator,'showdimension'=>$dimensi]);
    }
}
