<?php

namespace App\Http\Controllers\traits\user\view;

use Illuminate\Support\Facades\Auth;

trait SaveView
{
    public function viewsave()
    {
        return view('components.user.save')
            ->with('title', 'saved')
            ->with('user', Auth::user());
    }
}
