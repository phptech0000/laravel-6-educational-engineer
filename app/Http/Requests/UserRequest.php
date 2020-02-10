<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest {

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
            'uname' => 'required|string|min:3|max:35',
            'fname' => 'required|string|min:3|max:35',
            'lname' => 'required|string|min:3|max:35',
            'fileUpload' => 'nullable|image|mimes:jpeg,png|max:100',
            'gender' => 'required|string',
            'birthdate' => 'required|string',
            'academicrank' => 'required|string',
            'mangment' => 'nullable|string',
            'email' => 'required | string | email | max:255 | unique:users',
            'password' => 'required|string|min:8|max:20',
            'cpass'=>'required|string|min:8|max:20|same:password',
            'phone' => 'required|regex:/(01)[0-9]{9}/',
            'preferedcontact' => 'required|string|max:255',
        ];
    }

    public function messages() {
        return [
            'lname.required' => ' The first name field is required.',
            'fname.min' => ' The first name must be at least 3 characters.',
            'fname.max' => ' The first name may not be greater than 35 characters.',
            'lname.required' => ' The last name field is required.',
            'lname.min' => ' The last name must be at least 8 characters.',
            'lname.max' => ' The last name may not be greater than 35 characters.',
        ];
    }

}
