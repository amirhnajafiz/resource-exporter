<?php

namespace App\Http\Controllers\traits\post;

use App\Http\Requests\SearchRequest;
use App\Models\Post;

trait Search
{
    public function search(SearchRequest $request)
    {
        $validated = $request->validated();
        $keyword = $validated['keyword'];

        $result = Post::query()
            ->orWhere('title', 'like', '%'.$keyword.'%')
            ->orWhere('content', 'like', '%'.$keyword.'%')
            ->get();

        return view('components.public.search')
            ->with('title', 'search')
            ->with('keyword', $keyword)
            ->with('posts', $result->slice(0, min([count($result), 5])));
    }
}
