<?php

namespace App\Http\Controllers\traits\post;

use App\Models\Post;

trait AllPosts
{
    public function allPosts()
    {
        $posts = Post::all();
        return view('components.admin.posts')
            ->with('posts', $posts)
            ->with('title', 'posts');
    }
}
