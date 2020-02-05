<?php

namespace App\Http\Controllers\UserAuth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\User;
use Carbon\Carbon;
use Mail;
use Illuminate\Support\Facades\Auth;
use App\Mail\RestpasswordMail;
use Illuminate\Support\Facades\Hash;

class forgetpasswordController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('auth.passwords.email');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $request->validate([
            'email' => 'required|email'
        ]);
        //create password reset token 
        DB::table('password_resets')->insert([
            'email' => $request->input('email'),
            'token' => sha1(time()),
            'created_at' => Carbon::now(),
        ]);
        $tokenData = DB::table('password_resets')->where('email', $request->input('email'))->first();
        $this->sendMail($request->input('email'), $tokenData->token);
        $token = $tokenData->token;
        return redirect()->route('user.restmessage' , $token);
    }

    public function RestMessage($token) {
        $tokenData = DB::table('password_resets')->where('token' , $token)->first();
        $user = null;
        if ($tokenData) {
            $user = User::where('email', $tokenData->email)->first();
            if ($user) {
                $is_found = 1; //About User
                $message = 'Please review your mail box to reset the password via the link that was sent to this email';
            } else {
                $is_found = 0;  //Enter a valid Email or  Registration 
                $message = 'this email not exist in your acount please Enter a valid mail';
            }
        }
        return view('auth.passwords.RestMessage', compact('user', 'message','is_found'));
    }

    private function sendMail($email, $token) {
        $user = User::where('email', $email)->first();
        if ($user) {
            Mail::to($user->email)->send(new RestpasswordMail($user, $token));
            return true;
        } else {
            return false;
        }
    }

    public function dirctRestPasswordPage($token) {
        $tokenData = DB::table('password_resets')->where('token', $token)->first();
        if ($tokenData) {
            $tokencompact = $tokenData->token;
            return view('auth.passwords.RestPassword', compact('tokencompact'));
        } else {
            $is_found = 2;  //Index(Home Page)
            $user = Auth::user();
            $message = 'Password has be Resets';
            return view('auth.passwords.RestMessage', compact('user', 'message' ,'is_found'));
        }
    }

    public function RestPassword(Request $request) {
        $password = $request->input('password');
        $retypePassword = $request->input('retypepassword');
        $token = $request->input('token');

        $tokenData = DB::table('password_resets')->where('token', $token)->first();
        if (!$tokenData) {
            return view('auth.passwords.email');
        }
        $user = User::where('email', $tokenData->email)->first();
        if (!$user) {
            return 'Email not found';
        }
        $user->password = Hash::make($password);
        $user->update();
        Auth::login($user);
        DB::table('password_resets')->where('email', $user->email)->delete();
        return redirect()->route('index');
    }

}
