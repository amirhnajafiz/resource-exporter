<?php

namespace App\Http\Controllers\traits\post\view;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

/**
 * Trait UpdateView
 * @package App\Http\Controllers\traits\post\view
 */
trait UpdateView
{
    /**
     * @param $id
     * @return Application|Factory|View|RedirectResponse
     */
    public function updateview($id)
    {
        $post = Post::query()->findOrFail($id);
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
