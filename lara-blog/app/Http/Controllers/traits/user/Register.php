<?php

namespace App\Http\Controllers\traits\user;

use App\Http\Requests\UserRegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

trait Register
{
    public function register(UserRegisterRequest $request): \Illuminate\Http\RedirectResponse
    {
        $validated = $request->validated();

        $validated['password'] = Hash::make($validated['password']);
        User::query()->create($validated);

        return redirect()
            ->route('login.page');
    }
}
