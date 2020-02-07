<?php

namespace App\Http\Controllers\UserAuth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
class AdminController extends Controller
{
    public function adminapprove($email) {
        $user = User::where('email' , $email)->first();
        $message = '  Your account is waiting for our administrator approval.
                        <br />
                        Please check back later.';
        $is_found = 1;
        return view('auth.passwords.RestMessage' , compact('user' , 'message' ,'is_found'));
    }
}
