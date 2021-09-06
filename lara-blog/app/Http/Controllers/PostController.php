<?php

namespace App\Http\Controllers;

use App\Http\Controllers\traits\post\Delete;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    use Delete;

    public function viewpost($id = -1)
    {
        $post = Post::query()->findOrFail($id);

        return view('components.post.post_view')
            ->with('post', $post)
            ->with('title', 'post - view');
    }
}
