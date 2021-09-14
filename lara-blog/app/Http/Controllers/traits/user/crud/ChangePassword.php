<?php

namespace App\Http\Controllers\traits\user\crud;

use App\Http\Requests\UserChangePasswordRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

/**
 * Trait ChangePassword
 * @package App\Http\Controllers\traits\user\crud
 */
trait ChangePassword
{
    /**
     * @param UserChangePasswordRequest $request
     * @return RedirectResponse
     */
    public function changePassword(UserChangePasswordRequest $request): RedirectResponse
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
