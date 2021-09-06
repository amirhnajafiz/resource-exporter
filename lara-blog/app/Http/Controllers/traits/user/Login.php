<?php

namespace App\Http\Controllers\traits\user;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

trait Login
{
    public function login(Request $request): \Illuminate\Http\RedirectResponse
    {
        $rules = [
            'main_key' => 'required',
            'password' => 'required'
        ];

        $messages = [
            'required' => 'You must fill :attribute field.'
        ];

        $validator = \Illuminate\Support\Facades\Validator::make($request->all(), $rules, $messages);

        $validator->after(function ($validator) {
            return redirect()->back()->withErrors($validator)->withInput();
        });

        $validated = $validator->validate();

        $phone = ['phone' => $validated['main_key'], 'password' => $validated['password']];
        $mail = ['email' => $validated['main_key'], 'password' => $validated['password']];

        if (Auth::attempt($phone) || Auth::attempt($mail)) {
            return redirect()->route('dashboard');
        } else {
            return redirect()->route('login.page')->withErrors(['error' => 'User name and password don\'t match.']);
        }
    }
}
