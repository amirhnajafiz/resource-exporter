<?php

namespace App\Http\Controllers\traits\post;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

trait Restore
{
    public function restore($id): \Illuminate\Http\RedirectResponse
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
            $post->restore();
            return redirect()->route('trash', Auth::id());
        } else {
            return redirect()
                ->back()
                ->withErrors(['message' => 'You can only restore your own posts.']);
        }
    }
}
