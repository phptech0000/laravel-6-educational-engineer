<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateRegistration extends FormRequest {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'uname' => 'required|string|max:255',
            'fname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'userfile' => 'nullable|mimes:jpg,jpeg,png,gif',
            'gender' => 'required|string|max:255',
            'birthdate' => 'required|string|max:255',
            'academicrank' => 'required|string|max:255',
            'mangment' => 'nullable|string|max:255',
            'email' => 'required' | 'string' | 'email' | 'max:255' | 'unique:users',
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'year' => 'nullable|string|max:255',
            'branch' => 'required|string|max:255',
            'preferedcontact' => 'required|string|max:255',
            'phone' => 'required|string|max:255|number'
        ];
    }

    public function messages() {
        return [
            'uname.required' => 'user name is mandatoy',
            'fname.required' => 'First name is mandatoy',
            'lname.required' => 'Last name is mandatoy',
            'gender.required' => 'Gender is mandatoy',
            'birthdate.required' => 'BirthDate is mandatoy',
            'academicrank.required' => 'Academic Rank is mandatoy',
            'email.required' => ' email is mandatoy',
            'email.unique' => 'Email already exist',
            'email.regwx' => 'Invalid email',
            'password.required' => 'password is mandatoy',
            'branch.required' => 'Branch is mandatoy',
            'preferedcontact.required' => 'Contact Mehode is mandatoy',
            'phone.required' => 'Phone is mandatoy',
            'phone.size' => 'Phone must be 11 digit',
            'phone.regex' => 'Invalid phone',
        ];
    }

}
