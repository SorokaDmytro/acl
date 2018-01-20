<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
  public function new() {
    return view('users.new');
  }

  public function create(Request $request) {
    $new_user = new User();
    $new_user->name = $request->input('name');
    $new_user->password = Hash::make($request->input('password'));
    $new_user->email = $request->input('email');
    $new_user->role = Auth::user()->role;

    $current_user = User::find(Auth::user()->id);
    if ($current_user->can('set-user-role')) {
      switch ($request->input('role')) {
        case 'admin':
          $new_user->role = 'admin';
          break;

        default:
          $new_user->role = 'employee';
          break;
      }

    }

    $new_user->save();
    return redirect('/dashboard');
  }
}
