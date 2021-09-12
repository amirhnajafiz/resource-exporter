<?php

namespace App\Http\Controllers\traits\post\view;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
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
        $tags = Tag::all();
        $categories = Category::all();

        if ($post->user->id != Auth::id())
        {
            return redirect()
                ->back()
                ->withErrors(['message' => 'You cannot update a post for other people!']);
        } else {
            return view('components.post.update')
                ->with('post', $post)
                ->with('tags', $tags)
                ->with('categories', $categories)
                ->with('title', 'post - edit - ' . $post->user->name);
        }
    }
}
