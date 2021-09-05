<?php

namespace App\Http\Controllers\traits\user;

use Illuminate\Support\Facades\Auth;

trait Logout
{
    public function logout(): \Illuminate\Http\RedirectResponse
    {
        Auth::logout();
        return redirect()->route('welcome');
    }
}
