<?php

namespace App\Http\Controllers\traits\post\view;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;

trait DraftView
{
    public function viewdraft($id)
    {
        if ($id != Auth::id()) {
            return redirect()
                ->back()
                ->withErrors(['message' => 'You can\'t access here.']);
        } else {
            $posts = Post::query()
                ->where('user_id', '=', $id)
                ->where('published', '=', 0)
                ->get();
            return view('components.post.drafts')
                ->with('posts', $posts)
                ->with('title', 'drafts');
        }
    }
}
