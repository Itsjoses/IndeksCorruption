<?php

namespace App\Http\Controllers;

use App\Models\Dimension;
use App\Models\Indicator;
use App\Models\Response;
use Illuminate\Http\Request;

class ResponseController extends Controller
{
    //
    public function show($responses){
        $response = Response::find($responses);
        return view('responses.response-detail', ["response" => $response, "answers" => $response->answers]);
    }

    public function filtered_search_response($responses, Request $request){
        $search_query = $request["query"];
        $response = Response::find($responses);

        $answers = $response->answers()->whereHas("question", function ($query) use ($search_query){
            $query->where("name", "like", "%" . $search_query . "%");
        })->get();

        return view('responses.response-detail', ['response' => $response, "answers" => $answers]);
    }

    public function filtered_dimension_response($responses, $dimension){
        $response = Response::find($responses);

        $answers = $response->answers()->whereHas("question.indicator.dimension", function($query) use ($dimension){
            $query->where("id", $dimension);
        })->get();

        $dimension = Dimension::find($dimension);

        return view('responses.response-detail', ['response' => $response, "answers" => $answers, "dimension" => $dimension]);
    }

    public function filtered_dimension_search_response($responses, $dimension, Request $request){
        $response = Response::find($responses);
        $search_query = $request["query"];

        $answers = $response->answers()->whereHas("question.indicator.dimension", function($query) use ($dimension){
            $query->where("id", $dimension);
        })->whereHas("question", function ($query) use ($search_query){
            $query->where("name", "like", "%" . $search_query . "%");
        })->get();

        $dimension = Dimension::find($dimension);

        return view('responses.response-detail', ['response' => $response, "answers" => $answers, "dimension" => $dimension]);
    }

    public function filtered_indicator_response($responses, $indicator){
        $response = Response::find($responses);

        $answers = $response->answers()->whereHas("question.indicator", function($query) use ($indicator){
            $query->where("id", $indicator);
        })->get();

        $indicator = Indicator::find($indicator);

        return view('responses.response-detail', ['response' => $response, "answers" => $answers, "dimension" => $indicator->dimension, "indicator" => $indicator]);
    }

    public function filtered_indicator_search_response($responses, $indicator, Request $request){
        $response = Response::find($responses);
        $search_query = $request["query"];

        $answers = $response->answers()->whereHas("question.indicator", function($query) use ($indicator){
            $query->where("id", $indicator);
        })->whereHas("question", function ($query) use ($search_query){
            $query->where("name", "like", "%" . $search_query . "%");
        })->get();

        $indicator = Indicator::find($indicator);

        return view('responses.response-detail', ['response' => $response, "answers" => $answers, "dimension" => $indicator->dimension, "indicator" => $indicator]);
    }

    public function destroy($response){
        Response::destroy($response);
        return redirect()->back();
    }
}
