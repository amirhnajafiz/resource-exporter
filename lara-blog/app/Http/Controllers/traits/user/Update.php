<?php

namespace App\Http\Controllers\traits\user;

use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

trait Update
{
    public function update(UpdateUserRequest $request): \Illuminate\Http\RedirectResponse
    {
        $validated = $request->validated();

        unset($validated['user_id']);

        User::query()->where('id', '=', Auth::id())->update($validated);

        return redirect()
            ->route('dashboard');
    }
}
