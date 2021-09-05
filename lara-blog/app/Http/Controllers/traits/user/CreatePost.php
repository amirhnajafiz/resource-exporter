<?php

namespace App\Http\Controllers\traits\user;

use Illuminate\Support\Facades\Request;

trait CreatePost
{
    public function create(Request $request): \Illuminate\Http\RedirectResponse
    {
        //
        return redirect()->route('dashboard');
    }
}
