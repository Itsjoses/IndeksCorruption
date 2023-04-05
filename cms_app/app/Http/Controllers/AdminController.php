<?php

namespace App\Http\Controllers;

use App\Mail\EmailSender;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class AdminController extends Controller
{
    //
    function index(){
        $admins = User::all();
        return view("admins.admin-management", ["admins" => $admins]);
    }

    public function store(Request $request){
        $validation = [
            'name' => ['required'],
            'username' => ['required'],
            'email' => ['required', 'email', 'unique:App\Models\User,email'],
            'password' => ['required', Password::min(8)->numbers()->letters(),'confirmed'],
            'password_confirmation' => ['required'],
        ];

        $validator = Validator::make($request->all(), $validation);

        if($validator->fails()){
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $user = new User;
        $user->name = $request->name;
        $user->username = $request->name;
        $user->email = $request->email;
        $user->role_id = 2;
        $user->password = bcrypt($request->password);
        $user->created_at = Carbon::now()->toDateTimeString();
        $user->updated_at = Carbon::now()->toDateTimeString();
        $user->save();

        return redirect()->back()->with("success", "Registered. Wait to be accepted");
    }

    public function accept($admin){
        $user = User::find($admin);
        $user->is_accepted = true;
        $user->save();
        return redirect()->back()->with("success", "Successfully accept admin");
    }

    public function destroy($admin){
        User::destroy($admin);
        return redirect()->back()->with("success", "Successfully delete admin");
    }

    public function sendEmail($admin){

        // $admin = User::find($admin);

        // $details = [
        //     "subject" => "[CMS] Your Registration has been Accepted",
        //     "body" => "",
        //     "recipient_email" => $admin->email,
        // ];

        // $emailSender = new EmailSender($details);

        // \Mail::to($details["recipient_email"])->send(new $emailSender);
    }
}
