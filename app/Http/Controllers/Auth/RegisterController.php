<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    // Регистрация
    public function create(AuthRegisterRequest $request)
    {
        list($result, $user) = (new User())->create($request->all());
        if (!$result) {
            return back()->withErrors(['result' => __('register.fatal_error')]);
        }
        Auth::login($user);
        session([
            'username' => Auth::user()->getName(),
            'admin' => Auth::user()->hasRole('admin')
        ]);
        return redirect()->route('news::categories');
    }

}
