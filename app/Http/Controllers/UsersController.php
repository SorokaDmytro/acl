<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{
  public function new() {
    return view('users.new');
  }

  public function create(Request $request) {
    $user = $request->input('user');
    if (User::create($user) == true) {
      return redirect('/dashboard')->with('message', 'User has been created');
    } else {
      return redirect('/dashboard')->with('message', 'Failed to create user');
    }
  }
}
