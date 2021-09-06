<?php

namespace App\Http\Controllers\traits\post;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

trait Update
{
    public function update(Request $request): \Illuminate\Http\RedirectResponse
    {
        $rules = [
            'title' => 'required|max:50|min:2',
            'content' => 'max:128|min:5',
            'user_id' => 'exists:App\Models\User,id',
            'post_id' => 'exists:App\Models\Post,id'
        ];

        $messages = [
            'required' => 'You have to set a title.',
            'min' => 'The field :attribute is too short.',
            'max' => 'The field :attribute must be less than :size characters.',
            'exists' => 'Not found.'
        ];

        $validator = \Illuminate\Support\Facades\Validator::make($request->all(), $rules, $messages);

        $validator->after(function ($validator) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        });

        $validated = $validator->validate();

        $post = Post::query()->find($validated['post_id']);

        if ($validated['user_id'] != Auth::id() || $post->user->id != $validated['user_id'])
        {
            return redirect()
                ->back()
                ->withErrors(['message' => 'You cannot update a post for other people!'])
                ->withInput();
        }

        $post->update([
            'title' => $validated['title'],
            'content' => $validated['content']
        ]);

        $post->save();

        return redirect()->route('dashboard');
    }
}
