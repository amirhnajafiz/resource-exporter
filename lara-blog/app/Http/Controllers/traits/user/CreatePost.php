<?php

namespace App\Http\Controllers\traits\user;

use App\Models\Post;
use Illuminate\Http\Request;

trait CreatePost
{
    public function create(Request $request): \Illuminate\Http\RedirectResponse
    {
        $rules = [
            'title' => 'required|max:50|min:2',
            'content' => 'max:128|min:5',
            'user_id' => 'exists:App\Models\User,id'
        ];

        $messages = [
            'required' => 'You have to set a title.',
            'min' => 'The field :attribute is too short.',
            'max' => 'The field :attribute must be less than :size characters.',
            'exists' => 'No user found.'
        ];

        $validator = \Illuminate\Support\Facades\Validator::make($request->all(), $rules, $messages);

        $validator->after(function ($validator) {
            return redirect()->back()->withErrors($validator)->withInput();
        });

        $validated = $validator->validate();

        Post::query()->create($validated);

        return redirect()->route('dashboard');
    }
}
