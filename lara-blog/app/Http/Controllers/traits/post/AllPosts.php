<?php

namespace App\Http\Controllers\traits\post;

use App\Http\Controllers\traits\Offset;
use App\Models\Post;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

/**
 * Trait AllPosts
 * @package App\Http\Controllers\traits\post
 */
trait AllPosts
{
    // Traits
    use Offset;

    /**
     * @param int $offset
     * @return Application|Factory|View
     */
    public function allPosts($offset = 0)
    {
        $offset = $this->calculateOffset($offset, 25, Post::all()->where('published', '=', 1)->count());
        return view('components.admin.posts')
            ->with('posts', Post::query()->where('published', '=', 1)->skip($offset)->take(25)->get())
            ->with('offset', $offset)
            ->with('title', 'posts');
    }
}
