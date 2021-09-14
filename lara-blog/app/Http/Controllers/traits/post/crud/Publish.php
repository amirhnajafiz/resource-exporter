<?php

namespace App\Http\Controllers\traits\post\crud;

use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

/**
 * Trait Publish
 * @package App\Http\Controllers\traits\post\crud
 */
trait Publish
{
    /**
     * @param $id
     * @return RedirectResponse
     */
    public function publish($id): RedirectResponse
    {
        $post = Post::query()->findOrFail($id);
        $post->published = 1;
        $post->save();
        return redirect()->route('view.draft', Auth::id());
    }
}
