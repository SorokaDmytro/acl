<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public static function create($user) {
      if (!$user['name'] || !$user['password'] || !$user['email']) {
        return false;
      }
      if (User::where('name', $user['name'])->first()) {
        return false;
      }
      if (User::where('email', $user['name'])->first()) {
        return false;
      }
      $new_user = new User();
      $new_user->name = $user['name'];
      $new_user->password = Hash::make($user['password']);
      $new_user->email = $user['email'];
      return $new_user->save();
    }
}
