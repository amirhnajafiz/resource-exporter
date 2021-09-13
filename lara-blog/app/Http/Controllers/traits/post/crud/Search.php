<?php

namespace App\Http\Controllers\traits\post\crud;

use App\Http\Controllers\traits\Offset;
use App\Http\Requests\SearchRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;

trait Search
{
    use Offset;

    public function search(SearchRequest $request, $offset = 0)
    {
        $validated = $request->validated();
        $keyword = $validated['keyword'];

        $tag = Tag::query()->where('title', 'like', '%' . $keyword . '%')->first();
        $category = Category::query()->where('title', 'like', '%' . $keyword . '%')->first();

        $tags = $tag->posts;
        $categories = $category->posts;

        $result = $tags->concat($categories);
        $total = $result->count();

        $offset = $this->calculateOffset($offset, 5, $total);

        return view('components.public.search')
            ->with('title', 'search')
            ->with('keyword', $keyword)
            ->with('offset', $offset)
            ->with('posts', $result->skip($offset)->take(5));
    }
}
