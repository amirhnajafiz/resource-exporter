<?php

namespace App\Http\Controllers\traits\user\crud;

use App\Http\Requests\UserRegisterRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;

/**
 * Trait Register
 * @package App\Http\Controllers\traits\user\crud
 */
trait Register
{
    /**
     * @param UserRegisterRequest $request
     * @return RedirectResponse
     */
    public function register(UserRegisterRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        User::query()->create($validated);

        return redirect()
            ->route('login.page');
    }
}
