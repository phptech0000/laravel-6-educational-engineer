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
            'username' => 'required|string|max:255',
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'image' => 'nullable|mimes:jpeg,jpg,png,gif|required|max:10000',
            'gender' => 'required|string|max:255',
            'birthdata' => 'required|string|max:255',
            'academicrang' => 'required|string|max:255',
            'mangment' => 'nullable|string|max:255',
            'email' => 'required | string | email | max:255 | unique:users',
            'is_staff' => 'boolean',
            'password' => 'required| string|min:8, confirmed',
            'is_admin' => 'boolean',
            'phone' => 'required|regex:/(01)[0-9]{9}/',
            'Contact_method' => 'required|string|max:255',
            'verified' => 'boolean',
        ];
    }

    public function messages() {
        return [
            
        ];
    }

}
