<?php

namespace App\Http\Controllers\traits\post\crud;

use App\Http\Controllers\traits\file\FileCreate;
use App\Http\Requests\CreatePostRequest;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;

/**
 * Trait Create
 * @package App\Http\Controllers\traits\post\crud
 */
trait Create
{
    // Traits
    use FileCreate;

    /**
     * @param CreatePostRequest $request
     * @return RedirectResponse
     */
    public function create(CreatePostRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        $post = Post::query()->create($validated);

        // Saving the image of the post
        if ($request->file('file')) {
            $name = $post->id . "_image." . $request->file('file')->extension();
            $this->storeFile('posts', $name, $request->file('file'));
            // Database storing
            $post->image()->create([
                'title' => $validated['title'],
                'alt' => $post->slug,
                'path' => 'posts/' . $name
            ]);
        }

        // Publication status
        if ($request->has('draft')) {
            $post->published = 0;
            $post->save();
        }

        // Comments allow
        if ($request->has('allow_comments')) {
            $post->update([
                'allow_comments' => 1
            ]);
        }

        // Tags and categories database storing
        $post->tags()->sync($validated['tags_id']);
        $post->categories()->sync($validated['categories_id']);

        return redirect()->route('dashboard');
    }
}
