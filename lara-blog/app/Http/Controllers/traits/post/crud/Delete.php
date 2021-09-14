<?php

namespace App\Http\Controllers\traits\post\crud;

use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

/**
 * Trait Delete
 * @package App\Http\Controllers\traits\post\crud
 */
trait Delete
{
    /**
     * @param $id
     * @return RedirectResponse
     */
    public function delete($id): RedirectResponse
    {
        $post = Post::query()->findOrFail($id);

        if ($post->user->id == Auth::id())
        {
            $post->delete();
            return redirect()->route('dashboard');
        } else {
            if (Auth::user()->is_admin == 1) {
                $post->forceDelete();  // Admin force delete
                return redirect()->route('admin.posts');
            } else {
                return redirect()
                    ->back()
                    ->withErrors(['message' => 'You can only delete your own posts.']);
            }
        }
    }
}
