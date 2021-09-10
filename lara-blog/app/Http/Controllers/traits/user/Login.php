<?php

namespace App\Http\Controllers\traits\user;

use App\Http\Requests\UserLoginRequest;
use Illuminate\Support\Facades\Auth;

trait Login
{
    public function login(UserLoginRequest $request): \Illuminate\Http\RedirectResponse
    {
        $validated = $request->validated();

        $phone = ['phone' => $validated['main_key'], 'password' => $validated['password']];
        $mail = ['email' => $validated['main_key'], 'password' => $validated['password']];

        if (Auth::attempt($phone) || Auth::attempt($mail)) {
            return redirect()->route('dashboard');
        } else {
            return redirect()->route('login.page')->withErrors(['error' => 'User name and password don\'t match.']);
        }
    }
}
