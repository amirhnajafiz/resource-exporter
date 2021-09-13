<?php

namespace App\Http\Controllers\traits\post;

use App\Http\Controllers\traits\Offset;
use App\Models\Post;

trait AllPosts
{
    use Offset;

    public function allPosts($offset = 0)
    {
        $offset = $this->calculateOffset($offset, 25, Post::all()->where('published', '=', 1)->count());
        return view('components.admin.posts')
            ->with('posts', Post::query()->where('published', '=', 1)->skip($offset)->take(25)->get())
            ->with('offset', $offset)
            ->with('title', 'posts');
    }
}
