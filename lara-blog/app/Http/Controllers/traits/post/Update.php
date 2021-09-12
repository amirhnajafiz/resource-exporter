<?php

namespace App\Http\Controllers\traits\post;

use App\Http\Controllers\traits\file\FileReplace;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;

trait Update
{
    use FileReplace;

    public function update(UpdatePostRequest $request): \Illuminate\Http\RedirectResponse
    {
        $validated = $request->validated();

        $post = Post::query()->find($validated['post_id']);

        $post->update([
            'title' => $validated['title'],
            'content' => $validated['content']
        ]);

        if ($request->file('file')) {
            $oldName = isset($post->image) ? $post->image->path : '';
            $name = $post->id . "_image." . $request->file('file')->extension();
            $this->replaceFile('posts/', $name, $request->file('file', $oldName));
        }

        $post->tags()->sync($validated['tags_id']);
        $post->categories()->sync($validated['categories_id']);

        $post->save();

        return redirect()->route('dashboard');
    }
}
