<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UniqueUserEmail
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
        $newemail = $request->post('email');
        $user = Auth::user();

        if ($newemail !== $user->getEmail()) {
            if (!User::isUniqueEmail($newemail)) {
                return back()->withErrors([
                    'globalMessage' => __('profile.email_already_taken'),
                ]);
            }
        }

        return $next($request);
    }
}
