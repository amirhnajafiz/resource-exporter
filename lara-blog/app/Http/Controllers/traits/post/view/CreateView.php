<?php

namespace App\Http\Controllers\traits\post\view;

use App\Models\Category;
use App\Models\Tag;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

/**
 * Trait CreateView
 * @package App\Http\Controllers\traits\post\view
 */
trait CreateView
{
    /**
     * @return Application|Factory|View
     */
    public function createview()
    {
        $tags = Tag::all();
        $categories = Category::all();

        return view('components.post.create')
            ->with('tags', $tags)
            ->with('categories', $categories)
            ->with('title', 'create post');
    }
}
