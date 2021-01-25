<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminProfileSaveRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function myProfile()
    {
        return view('admin.profile', [
            'user' => Auth::user()
        ]);
    }

    public function save(AdminProfileSaveRequest $request)
    {
        // работают посредники
        // App\Http\Middleware\CheckCurrentPassword
        // App\Http\Middleware\UniqueUserEmail
        $saveResult = Auth::user()->saveProfile($request->all());
        session(['username' => Auth::user()->getName()]);
        return redirect()->route('admin::users::myprofile')
            ->with('saveResult', $saveResult);
    }
}
