<?php

namespace App\Http\Controllers\traits\user;

use App\Http\Requests\UserLoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

/**
 * Trait Login
 * @package App\Http\Controllers\traits\user
 */
trait Login
{
    /**
     * @param UserLoginRequest $request
     * @return RedirectResponse
     */
    public function login(UserLoginRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        // Phone or email logging in
        $phone = ['phone' => $validated['main_key'], 'password' => $validated['password']];
        $mail = ['email' => $validated['main_key'], 'password' => $validated['password']];

        if (Auth::attempt($phone) || Auth::attempt($mail)) {
            return redirect()->route('dashboard');
        } else {
            return redirect()->route('login.page')->withErrors(['error' => 'User name and password don\'t match.']);
        }
    }
}
