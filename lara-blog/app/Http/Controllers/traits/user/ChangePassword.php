<?php

namespace App\Http\Controllers\traits\user;

use App\Http\Requests\UserChangePasswordRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

trait ChangePassword
{
    public function changePassword(UserChangePasswordRequest $request): \Illuminate\Http\RedirectResponse
    {
        $validated = $request->validated();

        if (Hash::check($validated['old_password'], Auth::user()->getAuthPassword())) {
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
