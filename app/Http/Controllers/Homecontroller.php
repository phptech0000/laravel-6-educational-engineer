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

    public function getBranch($id) {
        $branch = branch::where('dep_id' ,"=" , $id)->pluck('branch' , 'id');
        return json_encode($branch);
    }
    public function getdep_name($id) {
        $dep = dep::where('id' , $id)->pluck('name' ,'id');
        return json_encode($dep);
    }

}
