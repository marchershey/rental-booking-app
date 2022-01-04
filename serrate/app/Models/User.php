<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Returns the user's profile if it exists, null if it doesn't
     *
     * @var array<string, string>
     */
    public static function returnIfExists($userData){
        $user = User::where('email', $userData['email'])->where('first_name', $userData['first_name'])->where('last_name', $userData['last_name'])->first();

        if($user){
            return $user;
        }

        return false;
    }

    /**
     * Create a new user
     *
     * @var array<string, string>
     */
    public static function createUser(Array $userData){
        $user = new User();
        $user->first_name = $userData['first_name'];
        $user->last_name = $userData['last_name'];
        $user->email = $userData['email'];

        if($user->save()){
            return $user;
        }

        return false;

    }

}
