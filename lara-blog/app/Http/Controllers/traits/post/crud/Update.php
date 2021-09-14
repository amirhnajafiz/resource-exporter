<?php

namespace App\Http\Controllers\traits\post\crud;

use App\Http\Controllers\traits\file\FileReplace;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

/**
 * Trait Update
 * @package App\Http\Controllers\traits\post\crud
 */
trait Update
{
    // Traits
    use FileReplace;

    /**
     * @param UpdatePostRequest $request
     * @return RedirectResponse
     */
    public function update(UpdatePostRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        $post = Post::query()->find($validated['post_id']);

        $post->update([
            'title' => $validated['title'],
            'content' => $validated['content']
        ]);

        if ($request->file('file')) {
            $oldName = $post->image ? $post->image->path : '';
            $name = $post->id . "_image." . $request->file('file')->extension();
            $this->replaceFile('posts/', $name, $request->file('file'), $oldName);
            if ($post->image) {
                $post->image()->update([
                    'path' => 'posts/' . $name
                ]);
            } else {
                $post->image()->create([
                    'title' => $validated['title'],
                    'alt' => $post->slug,
                    'path' => 'posts/' . $name
                ]);
            }
        }

        if ($request->has('allow_comments')) {
            $allow_comments = 1;
        } else {
            $allow_comments = 0;
        }

        $post->update([
            'allow_comments' => $allow_comments
        ]);

        $post->tags()->sync($validated['tags_id']);
        $post->categories()->sync($validated['categories_id']);

        $post->save();

        return redirect()->route('dashboard');
    }
}
