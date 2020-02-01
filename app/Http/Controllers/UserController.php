<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\dep;
use App\Year;
use App\Http\Requests\ValidateRegistration;
class UserController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        $data = User::orderBy('id', 'DESC')->paginate(5);
        return view('Dashboard.users.index', compact('data'))
                        ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $deps = dep::all();
        $years = Year::all();
        return view('auth.register', compact('deps', 'years'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidateRegistration $request) {
        return $request;
        $request->validate();
        $username = $request->input('uname');
        $firstname = $request->input('fname');
        $lastname = $request->input('lname');
        $image = $request->file('userfile');
        $gender = $request->input('gender');
        $birthdata = $request->input('birthdate');
        $academicrang = $request->input('academicrank');
        $mangment = $request->input('mangment');
        $email = $request->input('email');
        if ($academicrang != 'Student') {
            $istaff = 1;
        } else {
            $istaff = 0;
        }
        if (!isset($errors)) {
            $path = $request->file('userfile')->store('Users/images');
            $password = Hash::make(request('password'));
        }
        $year_id = $request->input('year');
        if ($mangment == 'Dean of the College') {
            $is_admin = 1;
        } else {
            $is_admin = 0;
        }
        $branch_id = $request->input('branch');
        $contact_methode = $request->input('preferedcontact');
        $phone = $request->input('phone');


        User::create([
            'username' => $username,
            'firstname' => $firstname,
            'lastname' => $lastname,
            'image' => $image,
            'gender' => $gender,
            'birthdata' => $birthdata,
            'academicrang' => $academicrang,
            'mangment' => $mangment,
            'email' => $email,
            'is_staff' => $istaff,
            'password' => $password,
            'year_id' => $year_id,
            'is_admin' => $is_admin,
            'branch_id' => $branch_id,
            'Contact_method' => $contact_methode,
            'phone' => $phone,
        ]);
        $data = array();
        $data['status'] = 'success';
        $data['message'] = 'Registration success';
        return response()->json($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
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

}
