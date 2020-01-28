<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use DB;
use App\branch;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = auth()->user();
        return view('welcome', compact('user'));
    }
    
    public function adminHome() {
        $allusers = User::all();
         return view('Dashboard.dashboard' , compact('allusers'));
    }
    public function getBranchs($id) {
        $branchs = DB::table("branches")->where('dep_id', $id)->pluck("branch","id");
        return json_encode($branchs);
    }
    
}
