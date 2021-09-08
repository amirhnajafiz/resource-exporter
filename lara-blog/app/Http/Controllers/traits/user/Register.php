<?php

namespace App\Http\Controllers\traits\user;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

trait Register
{
    public function register(Request $request): \Illuminate\Http\RedirectResponse
    {
        $rules = [
            'email' => 'required|email:rfc,dns',
            'phone' => 'required',
            'name' => 'required|max:20',
            'password' => 'required|min:8|max:20'
        ];

        $messages = [
            'required' => 'The :attribute field is required!',
            'max' => 'The :attribute must be less than :size characters.',
            'min' => 'The :attribute must be at least :size characters.'
        ];

        $validator = \Illuminate\Support\Facades\Validator::make($request->all(), $rules, $messages);

        $validator->after(function ($validator) {
            return redirect()->back()->withErrors($validator)->withInput();
        });

        $validated = $validator->validate();

        $validated['password'] = Hash::make($validated['password']);
        User::query()->create($validated);

        return redirect()
            ->route('login.page');
    }
}
