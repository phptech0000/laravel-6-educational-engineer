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
        if ($this->sendMail($request->input('email'), $tokenData->token)) {
            return 'A reset link has been sent to your email address Please check now ';
        } else {
            return 'A mail not Recode in a Database Please Enter a valid your Email';
        }
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
        $tokencompact = $tokenData->token;
        return view('auth.passwords.RestPassword', compact('tokencompact'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }

    public function RestPassword(Request $request) {
        $request->validate([
            'email' => 'required|exists:users,email',
            'password' => 'required|confirmed'
        ]);
        $password = $request->input('password');
        $retypePassword = $request->input('retypepassword');
        $token = $request->input('token');
        if ($password == $retypePassword) {
            $tokenData = DB::table('password_resets')->where('token', $token)->first();
            if (!$tokenData) {
                return view('auth.passwords.email');
            }
            $user = User::where('email', $tokenData->email)->first();
            if (!$user) {
                return 'Email not found';
            }
            $user->password = Hash::make($password);
            return $user;
            $user->update();
            Auth::login($user);
            DB::table('password_resets')->where('email', $user->email)->delete();
            return redirect()->route('index');
        } else {
            return 'password not Math';
        }
    }

}
