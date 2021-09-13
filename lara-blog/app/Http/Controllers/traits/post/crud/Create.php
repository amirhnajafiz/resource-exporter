<?php

namespace App\Http\Controllers\traits\post\crud;

use App\Http\Controllers\traits\file\FileCreate;
use App\Http\Requests\CreatePostRequest;
use App\Models\Post;

trait Create
{
    use FileCreate;

    public function create(CreatePostRequest $request): \Illuminate\Http\RedirectResponse
    {
        $validated = $request->validated();

        $post = Post::query()->create($validated);

        if ($request->file('file')) {
            $name = $post->id . "_image." . $request->file('file')->extension();
            $this->storeFile('posts', $name, $request->file('file'));

            $post->image()->create([
                'title' => $validated['title'],
                'alt' => $post->slug,
                'path' => 'posts/' . $name
            ]);
        }

        if ($request->has('draft')) {
            $post->published = 0;
        }

        if ($request->has('allow_comments')) {
            $post->update([
                'allow_comments' => 1
            ]);
        }

        $post->tags()->sync($validated['tags_id']);
        $post->categories()->sync($validated['categories_id']);

        return redirect()->route('dashboard');
    }
}
