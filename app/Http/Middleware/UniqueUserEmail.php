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
    
    // При update профайла правило unique валидации не подойдет,
    // у юзера может быть его старый емайл, 
    // а если емайл указан новый, то проверить отсутствие такого в базе
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
