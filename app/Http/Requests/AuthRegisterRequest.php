<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthRegisterRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'required|min:3|max:50',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:6|max:255',
            'password_confirmation' => 'required|min:6|max:255',
        ];
    }

    public function attributes()
    {
        return [
            'name' => '«'.__('register.name').'»',
            'email' => '«'.__('register.email').'»',
            'password' => '«'.__('register.password').'»',
            'password_confirmation' => '«'.__('register.password_confirmation').'»',
        ];
    }

    public function messages()
    {
        return [
            'unique' => __('register.user_exists'),
        ];
    }
}
