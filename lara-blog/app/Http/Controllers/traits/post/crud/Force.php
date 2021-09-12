<?php

namespace App\Http\Controllers\traits\post\crud;

use App\Http\Controllers\traits\file\FileDestroy;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

trait Force
{
    use FileDestroy;

    public function force($id): \Illuminate\Http\RedirectResponse
    {
        $rules = [
            'id' => 'exists:App\Models\Post,id'
        ];

        $messages = [
            'exists' => 'No post found.'
        ];

        $validator = Validator::make(['id' => $id], $rules, $messages);

        $validator->after(function ($validator) {
            return redirect()
                ->back()
                ->withErrors($validator);
        });

        $validated = $validator->validate();

        $post = Post::onlyTrashed()->find($validated['id']);

        if ($post->user->id == Auth::id())
        {
            $image = $post->image->path;
            $this->destroyFile($image);
            $post->forceDelete();
            return redirect()->route('trash', Auth::id());
        } else {
            return redirect()
                ->back()
                ->withErrors(['message' => 'You can only delete your own posts.']);
        }
    }
}
