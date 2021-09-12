<?php

namespace App\Http\Controllers;

use App\Http\Controllers\traits\post\AllPosts;
use App\Http\Controllers\traits\post\crud\Create;
use App\Http\Controllers\traits\post\view\CreateView;
use App\Http\Controllers\traits\post\crud\Delete;
use App\Http\Controllers\traits\post\crud\Force;
use App\Http\Controllers\traits\post\crud\Restore;
use App\Http\Controllers\traits\post\crud\Search;
use App\Http\Controllers\traits\post\crud\Update;
use App\Http\Controllers\traits\post\view\UpdateView;
use App\Models\Post;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

/**
 * Class PostController
 * @package App\Http\Controllers
 */
class PostController extends Controller
{
    // Traits
    use Create, Delete, Force, Restore, Update, Search, UpdateView, CreateView, AllPosts;

    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        $posts = Post::all();
        return view('components.public.index')
            ->with('posts', $posts->random(min([5, $posts->count()])))
            ->with('title', 'public');
    }

    /**
     * @param int $id
     * @return Application|Factory|View
     */
    public function viewpost($id = -1)
    {
        $post = Post::query()->findOrFail($id);

        return view('components.post.postview')
            ->with('post', $post)
            ->with('title', 'post - view');
    }

    /**
     * @param $id
     * @return Application|Factory|View|RedirectResponse
     */
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
