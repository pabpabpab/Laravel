<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Login
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $data = $request->only('email', 'password', 'remember');

        $remember = isset($data['remember']) ? $data['remember'] : false;
        $credentials = [
            'email' => $data['email'],
            'password' => $data['password']
        ];

        if (!Auth::attempt($credentials, $remember)) {
            return back()->withErrors([
                'result' => __('login.login_fail'),
            ]);
        }

        $request->session()->regenerate();

        session([
            'username' => Auth::user()->getName(),
            'admin' => Auth::user()->hasRole('admin')
        ]);

        return $next($request);
    }
}
