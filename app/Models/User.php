<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'role',
        'email',
        'password',

        'soc_id',
        'auth_type',
        'avatar',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Регистрация
    public function create($input) {
        $role = 'user';
        if ($input['email'] === 'admin@'.explode('//', env('APP_URL'))[1]) {
            $role = 'admin';
        }

        $user = new User();
        $user->fill([
            'name' => $input['name'],
            'role' => $role,
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);

        return [
            $user->save(), // result
            $user // user in order to make Auth::login();
        ];
    }

    // Редактировать профайл (сохранение)
    public function saveProfile($input) {
        $this->name = $input['name'];
        $this->email = $input['email'];
        if (isset($input['new_password'])) {
            $this->password = Hash::make($input['new_password']);
        }
        return $this->save();
    }



    public function hasRole($role) {
        return $this->role == $role;
    }

    public function getName() {
        return $this->name;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getPassword() {
        return $this->password;
    }

    public static function isUniqueEmail($email) {
        return static::query()
                ->where('email', $email)
                ->count() === 0;
    }

}
