<?php

namespace App\Http\Controllers\traits\post;

use App\Models\Post;
use Illuminate\Http\Request;

trait Search
{
    public function search(Request $request)
    {
        $keyword = $request->input('keyword');

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
