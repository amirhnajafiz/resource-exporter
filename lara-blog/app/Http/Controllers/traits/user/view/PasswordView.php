<?php

namespace App\Http\Controllers\traits\user\view;

use Illuminate\Support\Facades\Auth;

trait PasswordView
{
    public function passwordview($id)
    {
        if ($id != Auth::id()) {
            return redirect()
                ->back()
                ->withErrors(['message' => 'You can\'t access here.']);
        } else {
            return view('components.user.password_change')
                ->with('user', Auth::user())
                ->with('title', 'password - change');
        }
    }
}
