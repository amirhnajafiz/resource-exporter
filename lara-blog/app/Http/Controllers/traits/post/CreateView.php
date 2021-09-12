<?php

namespace App\Http\Controllers\traits\post;

use App\Models\Category;
use App\Models\Tag;

trait CreateView
{
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
