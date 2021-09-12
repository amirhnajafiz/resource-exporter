<?php

namespace App\Http\Controllers\traits\user;

use App\Http\Requests\CreatePostRequest;
use App\Models\Post;

trait CreatePost
{
    public function create(CreatePostRequest $request): \Illuminate\Http\RedirectResponse
    {
        $validated = $request->validated();

        $post = Post::query()->create($validated);

        $post->tags()->sync($validated['tags_id']);
        $post->categories()->sync($validated['categories_id']);

        return redirect()->route('dashboard');
    }
}
