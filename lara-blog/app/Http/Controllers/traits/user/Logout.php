<?php

namespace App\Http\Controllers\traits\user;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

/**
 * Trait Logout
 * @package App\Http\Controllers\traits\user
 */
trait Logout
{
    /**
     * @return RedirectResponse
     */
    public function logout(): RedirectResponse
    {
        Auth::logout();
        return redirect()->route('welcome');
    }
}
