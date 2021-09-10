<?php

namespace App\Http\Controllers\traits\user;

use App\Http\Requests\CreateCommentRequest;
use Illuminate\Support\Facades\Auth;

trait Comment
{
    public function comment(CreateCommentRequest $request): \Illuminate\Http\RedirectResponse
    {
        $validated = $request->validated();

        \App\Models\Comment::query()->create([
            'user_id' => Auth::id(),
            'post_id' => $validated['post_id'],
            'content' => $validated['comment'],
        ]);

        return redirect()->back();
    }
}
