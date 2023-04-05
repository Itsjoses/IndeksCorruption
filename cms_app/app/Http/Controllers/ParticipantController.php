<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Domicile;
use App\Models\Participant;
use App\Models\Province;
use Illuminate\Http\Request;

class ParticipantController extends Controller
{
    //
    public function index(){
        $participants = Participant::all();
        // dd($participants->first()->domiciles->last()->city);
        // dd($participants->first()->domicile->city);
        return view('participants.participant-management', ['participants' => $participants]);
    }

    public function filtered_search_participant(Request $request){
        $query = $request["query"];
        $participants = Participant::where("name", "like", "%". $query . "%")->get();

        return view('participants.participant-management', ['participants' => $participants]);
    }

    public function filtered_province_participant($province){
        $province = Province::find($province);

        $participants = Participant::whereHas("domicile.city.province", function($query) use ($province){
            $query->where("id", $province->id);
        })->get();

        return view('participants.participant-management', ['participants' => $participants, "province" => $province]);
    }

    public function filtered_province_search_participant($province, Request $request){
        $province = Province::find($province);
        $query = $request["query"];

        $participants = Participant::whereHas("domicile.city.province", function($query) use ($province){
            $query->where("id", $province->id);
        })->where("name", "like", "%". $query . "%")->get();

        return view('participants.participant-management', ['participants' => $participants, "province" => $province]);
    }

    public function filtered_city_participant($city){
        $participants = Participant::whereHas("domicile.city", function($query) use ($city){
            $query->where("id", $city);
        })->get();

        $city = City::find($city);

        return view('participants.participant-management', ['participants' => $participants, "province" => $city->province, "city" => $city]);
    }

    public function filtered_city_search_participant($city, Request $request){
        $query = $request["query"];
        $participants = Participant::whereHas("domicile.city", function($query) use ($city){
            $query->where("id", $city);
        })->where("name", "like", "%". $query . "%")->get();

        $city = City::find($city);

        return view('participants.participant-management', ['participants' => $participants, "province" => $city->province, "city" => $city]);
    }

    public function show($participant){
        $participant = Participant::find($participant);
        return view('participants.participant-detail', ['participant' => $participant]);
    }

    public function destroy($participant){
        Participant::destroy($participant);
        return redirect()->back()->with("success", "Successfully delete participant");
    }
}
