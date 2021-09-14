<?php

namespace App\Http\Controllers\traits\user\crud;

use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Trait Update
 * @package App\Http\Controllers\traits\user\crud
 */
trait Update
{
    /**
     * @param UpdateUserRequest $request
     * @return RedirectResponse
     */
    public function update(UpdateUserRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        unset($validated['user_id']);

        User::query()->where('id', '=', Auth::id())->update($validated);

        return redirect()
            ->route('dashboard');
    }
}
