<?php

namespace App\Http\Controllers\traits\post\view;

use App\Models\Post;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

/**
 * Trait DraftView
 * @package App\Http\Controllers\traits\post\view
 */
trait DraftView
{
    /**
     * @param $id
     * @return Application|Factory|View|RedirectResponse
     */
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
