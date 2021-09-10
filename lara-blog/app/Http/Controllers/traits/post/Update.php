<?php

namespace App\Http\Controllers\traits\post;

use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

trait Update
{
    public function update(UpdatePostRequest $request): \Illuminate\Http\RedirectResponse
    {
        $validated = $request->validated();

        $post = Post::query()->find($validated['post_id']);

        $post->update([
            'title' => $validated['title'],
            'content' => $validated['content']
        ]);

        $post->save();

        return redirect()->route('dashboard');
    }
}
