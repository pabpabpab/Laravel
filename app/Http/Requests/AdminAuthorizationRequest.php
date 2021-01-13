<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminAuthorizationRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'login' => 'required|max:255',
            'password' => 'required|max:255',
        ];
    }

    public function attributes()
    {
        return [
            'login' => '«Логин»',
            'password' => '«Пароль»',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Введите пожалуйста :attribute',
        ];
    }
}
