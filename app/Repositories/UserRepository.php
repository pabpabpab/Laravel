<?php


namespace App\Repositories;


use App\Models\User;

class UserRepository
{
    public function getBySocialId($socUser, $socialNetwork)
    {
        $localUser = User::query()
            ->where('soc_id', $socUser->getId())
            ->where('auth_type', $socialNetwork)
            ->first();

        if(is_null($localUser)) {
            $localUser = new User();
            $localUser->fill([
                'name' => $socUser->getName(),
                'email' => $socUser->getEmail(),
                'password' => null,
                'soc_id' => $socUser->getId(),
                'auth_type' => $socialNetwork,
                'avatar' => $socUser->getAvatar(),
            ])->save();
        }

        return $localUser;
    }
}
