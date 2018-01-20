<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Models\User;
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
    $new_user->save();
    return redirect('/dashboard');
  }
}
