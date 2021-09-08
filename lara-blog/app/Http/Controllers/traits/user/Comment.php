<?php

namespace App\Http\Controllers\traits\user;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

trait Comment
{
    public function comment(Request $request): \Illuminate\Http\RedirectResponse
    {
        \App\Models\Comment::query()->create([
            'user_id' => Auth::id(),
            'post_id' => $request->input('post_id'),
            'content' => $request->input('comment'),
        ]);

        return redirect()->back();
    }
}
