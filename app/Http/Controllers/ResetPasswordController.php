<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;

class ResetPasswordController extends Controller
{
  public function showResetForm($token)
  {
    return view('auth.reset-password', ['token' => $token]);
  }

  public function reset(Request $request)
  {
    if (Auth::check()) {
      return redirect()->route('home');
    }

    $request->validate([
      'token' => 'required',
      'email' => 'required|email',
      'password' => 'required|confirmed|min:6',
    ]);

    $status = Password::reset(
      $request->only('email', 'password', 'password_confirmation', 'token'),
      function ($user, $password) {
        $user->forceFill([
          'password' => Hash::make($password),
          'remember_token' => Str::random(60),
        ])->save();
      }
    );

    return $status === Password::PASSWORD_RESET
      ? redirect('/login')->with('message', __($status))
      : back()->withErrors(['email' => [__($status)]]);
  }
}
