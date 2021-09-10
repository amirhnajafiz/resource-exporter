<?php

namespace App\Http\Controllers\traits\post;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

trait UpdateView
{
    public function updateview($id)
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

        $post = Post::query()->find($validated['id']);

        if ($post->user->id != Auth::id())
        {
            return redirect()
                ->back()
                ->withErrors(['message' => 'You cannot update a post for other people!']);
        } else {
            return view('components.post.update')
                ->with('post', $post)
                ->with('title', 'post - edit - ' . $post->user->name);
        }
    }
}
