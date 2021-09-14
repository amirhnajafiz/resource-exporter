<?php

namespace App\Http\Controllers\traits\post\crud;

use App\Http\Controllers\traits\file\FileDestroy;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

/**
 * Trait Force
 * @package App\Http\Controllers\traits\post\crud
 */
trait Force
{
    use FileDestroy;

    /**
     * @param $id
     * @return RedirectResponse
     */
    public function force($id): RedirectResponse
    {
        $post = Post::onlyTrashed()->findOrFail($id);

        if ($post->user->id == Auth::id())
        {
            $image = $post->image ? $post->image->path : '';
            $this->destroyFile($image);  // Storage delete
            $post->forceDelete();  // Database delete
            return redirect()->route('trash', Auth::id());
        } else {
            return redirect()
                ->back()
                ->withErrors(['message' => 'You can only delete your own posts.']);
        }
    }
}
