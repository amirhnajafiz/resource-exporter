<?php

namespace App\Http\Controllers\traits\post;

use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;

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

        $post->tags()->sync($validated['tags_id']);
        $post->categories()->sync($validated['categories_id']);

        $post->save();

        return redirect()->route('dashboard');
    }
}
