<?php

namespace App\Http\Controllers\traits\user\view;

use Illuminate\Support\Facades\Auth;

trait UpdateView
{
    public function updateview($id)
    {
        if ($id != Auth::id()) {
            return redirect()
                ->back()
                ->withErrors(['message' => 'You can\'t access here.']);
        } else {
            return view('components.user.change')
                ->with('user', Auth::user())
                ->with('title', 'profile');
        }
    }
}
