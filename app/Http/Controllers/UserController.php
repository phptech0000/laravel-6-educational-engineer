<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\dep;
use App\Year;
use App\branch;
use App\VerifyUser;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use App\Notifications\NewUserNotification;
use App\Events\UserHasRegistered;
use Notification;
use Mail;
use App\Mail\VerifyMail;

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
    public function store(Request $request) {
        $username = $request->input('uname');
        $firstname = $request->input('fname');
        $lastname = $request->input('lname');
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
        $password = Hash::make(request('password'));


        $year_id = $request->input('year');
        if ($mangment == 'Dean of the College') {
            $is_admin = 1;
        } else {
            $is_admin = 0;
        }
        $branch_id = $request->input('branch');
        $contact_methode = $request->input('preferedcontact');
        $phone = $request->input('phone');
        $user = User::where('email', '=', $email)->first();
        $user = new User;
        $year = Year::find($year_id);
        $branch = branch::find($branch_id);
        $user->username = $username;
        $user->firstname = $firstname;
        $user->lastname = $lastname;
        if ($request->hasFile('fileUpload')) {
            $rules = ['fileUpload' => 'nullable|mimes:jpg,jpeg,png'];
            $request->validate($rules);
            $path = $request->file('fileUpload')->store('Users/images');
            $image = $request->file('fileUpload');
            $user->image = $image;
        }
        $user->gender = $gender;
        $user->birthdata = $birthdata;
        $user->academicrang = $academicrang;
        $user->mangment = $mangment;
        $user->email = $email;
        $user->is_staff = $istaff;
        $user->password = $password;
        $user->year()->associate($year);
        $user->is_admin = $is_admin;
        $user->branch()->associate($branch);
        $user->Contact_method = $contact_methode;
        $user->phone = $phone;
        event(new Registered($user->save()));
        $this->guard()->login($user);
        $this->assignRouls($mangment, $academicrang, $is_admin, $user);
        $data = array();
        $verifyUser = VerifyUser::create([
                    'user_id' => $user->id,
                    'token' => sha1(time()),
        ]);
        $this->sendnotificationNewUser($user);
        $this->PusherNotications($user);
        Mail::to($user->email)->send(new VerifyMail($user));
        return $this->authenticated($request, $user);
    }

    /**
     * Display the specified resource.
     * user_profile
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
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        
    }

    /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard() {
        return Auth::guard();
    }

    public function authenticated(Request $request, $user) {
        if (!$user->verified) {
            auth()->logout();
            $is_found = 1;
            $message = 'warning You need to confirm your account. We have sent you an activation meesage, please check your email.';
            return view('auth.passwords.RestMessage', compact('user', 'message', 'is_found'));
        }
        return redirect()->intended('/');
    }

    /**
     * The user has been registered.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function registered(Request $request, $user) {
        
    }

    protected function assignRouls($mangment, $acadmicrank, $is_admin, User $user) {
        if ($is_admin == 1) {
            $role_admin = Role::create(['name' => 'Super Admin']);
            $permissions = Permission::all();
            $role_admin->syncPermissions($permissions);
            $user->assignRole($role_admin);
            $user->syncPermissions($permissions);
        }
    }

    public function getBranch($id) {
        $branch = branch::where('dep_id', "=", $id)->pluck('branch', 'id');
        return json_encode($branch);
    }

    public function getdep_name($id) {
        $dep = dep::where('id', $id)->pluck('name', 'id');
        return json_encode($dep);
    }

    public function verifyUser($token) {
        $user = null;
        $verifyuser = VerifyUser::where('token', $token)->first();
        if (isset($verifyuser)) {
            if (!$verifyuser->user->verified) {
                $verifyuser->user->verified = 1;
                $verifyuser->email_verified_at = now();

                $status = $verifyuser->user->save();
                "Your e-mail is verified. You can now login.";
            } else {
                $status = "Your e-mail is already verified. You can now login.";
            }
        } else {
            $message = 'Sorry your email cannot be identified.';
            $is_found = 2;
            return view('auth.passwords.RestMessage', compact('user', 'message', 'is_found'));
        }
        $this->guard()->login($verifyuser->user);
        $email = $verifyuser->user->email;
        return redirect()->route('admin.approve', $email)->with('status', $status);
    }

    public function sendnotificationNewUser(User $user) {
        $admins = User::where('is_admin', '1')->get();
        Notification::send($admins, new NewUserNotification($user));
    }

    public function PusherNotications(User $user) {
        event(new UserHasRegistered($user));
    }

  

}
