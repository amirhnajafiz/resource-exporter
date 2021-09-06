<?php

namespace App\Http\Controllers;

use App\Http\Controllers\traits\post\Delete;
use App\Http\Controllers\traits\post\Force;
use App\Http\Controllers\traits\post\Restore;
use App\Http\Controllers\traits\post\Update;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    use Delete, Force, Restore, Update;

    public function viewpost($id = -1)
    {
        $post = Post::query()->findOrFail($id);

        return view('components.post.post_view')
            ->with('post', $post)
            ->with('title', 'post - view');
    }

    public function viewtrash($id)
    {
        if ($id != Auth::id()) {
            return redirect()
                ->back()
                ->withErrors(['message' => 'You can\'t access here.']);
        } else {
            $posts = Post::onlyTrashed()->where('user_id', '=', $id)->get();
            return view('components.post.trash')
                ->with('posts', $posts)
                ->with('title', 'trash');
        }
    }
}
