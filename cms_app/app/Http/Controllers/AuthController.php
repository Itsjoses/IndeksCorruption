<?php

namespace App\Http\Controllers;

use App\Models\Year;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //
    public function index(){
        if(Auth::check()){

            if(!Auth::user()->is_accepted){
                Auth::logout();
                return redirect('/login')->withErrors(["Your account has not been accepted."]);
            }

            $year = Carbon::now()->year;
            return redirect("/surveys/" . $year);
        }
        return view('guests.login');
    }

    public function login(Request $request){
        $credentials = ["username" => $request->username, "password" => $request->password];

        if(!Auth::attempt($credentials)){
            return redirect()->back()->withInput()->withErrors(["error" => "Unmatched Credential"]);
        }
    
        return redirect('/');
    }

    public function logout(){
        Auth::logout();
        return redirect('/login');
    }

}
