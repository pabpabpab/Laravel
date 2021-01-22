<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminProfileSaveRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'required|min:3|max:50',
            'email' => 'required|email',
            'new_password' => 'nullable|min:6|max:255',
            'current_password' => 'required|min:6|max:255',
        ];
    }

    public function attributes()
    {
        return [
            'name' => '«'.__('profile.name').'»',
            'email' => '«'.__('profile.email').'»',
            'new_password' => '«'.__('profile.new_password').'»',
            'current_password' => '«'.__('profile.current_password').'»',
        ];
    }
}
