<?php

namespace App\Http\Controllers\traits\user;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Testing\Fluent\Concerns\Has;

trait ChangePassword
{
    public function changePassword(Request $request): \Illuminate\Http\RedirectResponse
    {
        $rules = [
            'old_password' => 'required|max:20|min:3',
            'password' => 'required|max:20|min:3'
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

        if ($request->input('user') != Auth::id()) {
            return redirect()
                ->back()
                ->withErrors(['message' => 'You can\'t edit other peoples password.'])
                ->withInput();
        } else if (Hash::check($validated['old_password'], Auth::user()->getAuthPassword())) {
            User::query()
                ->where('id', '=', Auth::id())
                ->update(['password' => Hash::make($validated['password'])]);
            return redirect()
                ->route('dashboard');
        } else {
            return redirect()
                ->back()
                ->withErrors(['message' => 'Wrong password.'])
                ->withInput();
        }
    }
}
