<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthLoginRequest extends FormRequest
{

    public function rules()
    {
        return [
            'email' => 'required|email',
            'password' => 'required|min:6|max:255',
            'remember' => 'boolean',
        ];
    }

    public function attributes()
    {
        return [
            'email' => '«'.__('login.email').'»',
            'password' => '«'.__('login.password').'»',
            'remember' => '«'.__('login.remember_me').'»',
        ];
    }

}
