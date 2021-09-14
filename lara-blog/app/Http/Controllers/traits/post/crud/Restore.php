<?php

namespace App\Http\Controllers\traits\post\crud;

use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

/**
 * Trait Restore
 * @package App\Http\Controllers\traits\post\crud
 */
trait Restore
{
    /**
     * @param $id
     * @return RedirectResponse
     */
    public function restore($id): RedirectResponse
    {
        $post = Post::onlyTrashed()->findOrFail($id);

        if ($post->user->id == Auth::id())
        {
            $post->restore();
            return redirect()->route('trash', Auth::id());
        } else {
            return redirect()
                ->back()
                ->withErrors(['message' => 'You can only restore your own posts.']);
        }
    }
}
