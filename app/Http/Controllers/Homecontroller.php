<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use DB;
use App\dep;
use App\branch;

class HomeController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
 
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {
        $user = auth()->user();
        return view('welcome', compact('user'));
    }

    public function adminHome() {
        $allusers = User::all();
        return view('Dashboard.dashboard', compact('allusers'));
    }



}
