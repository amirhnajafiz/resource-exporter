<?php

namespace App\Http\Controllers\traits\user;

use App\Http\Requests\CreatePostRequest;
use App\Models\Post;

trait CreatePost
{
    public function create(CreatePostRequest $request): \Illuminate\Http\RedirectResponse
    {
        $validated = $request->validated();

        Post::query()->create($validated);

        return redirect()->route('dashboard');
    }
}
