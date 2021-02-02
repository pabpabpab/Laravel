<?php

namespace App\Http\Controllers;

use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{
    public function login($socialNetwork)
    {
        // проверка на «гость» в роутах middleware('guest')
        // будем отправлены на соцсеть
        return Socialite::with($socialNetwork)->redirect();
    }

    public function response(UserRepository $repository, $socialNetwork) {
        // user received from social network
        $socUser = Socialite::driver($socialNetwork)->user();
        $localUser = $repository->getBySocialId($socUser, $socialNetwork);
        Auth::login($localUser);
        session([
            'username' => Auth::user()->getName(),
            'admin' => Auth::user()->hasRole('admin')
        ]);
        return redirect()->route('news::categories');
    }
}
