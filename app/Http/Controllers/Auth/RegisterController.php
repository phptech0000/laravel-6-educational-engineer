<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller {
    /*
      |--------------------------------------------------------------------------
      | Register Controller
      |--------------------------------------------------------------------------
      |
      | This controller handles the registration of new users as well as their
      | validation and creation. By default this controller uses a trait to
      | provide this functionality without requiring any additional code.
      |
     */

use RegistersUsers;

    protected $redirectTo = '/';

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data) {
        return Validator::make($data, [
                    'username' => ['required', 'string', 'max:255'],
                    'firstname' => ['required', 'string', 'max:255'],
                    'lastname' => ['required', 'string', 'max:255'],
                    'image' => ['nullable', 'mimes:jpg,jpeg,png,gif'],
                    'gender' => ['required', 'string', 'max:255'],
                    'birthdata' => ['required', 'string', 'max:255'],
                    'academicrang' => ['required', 'string', 'max:255'],
                    'mangment' => ['nullable', 'string', 'max:255'],
                    'Contact_method' => ['required', 'string', 'max:255'],
                    'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                    'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data) {
        return User::create([
                    'username' => $data['uname'],
                    'email' => $data['email'],
                    'password' => Hash::make($data['password']),
        ]);
    }
}
