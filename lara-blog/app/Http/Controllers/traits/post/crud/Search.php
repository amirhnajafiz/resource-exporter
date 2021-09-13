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
        $keywords = explode("|", $validated['keyword']);

        $tags = Tag::all();
        $categories = Category::all();

        $result = $tags->concat($categories);

        foreach ($keywords as $keyword) {

            $tag = Tag::query()->where('title', '=', $keyword)->first();
            $category = Category::query()->where('title', '=', $keyword)->first();

            $tags = $tag ? $tag->posts : collect([]);
            $categories = $category ? $category->posts : collect([]);

            $result = $result->intersect($tags->concat($categories));
        }

        $total = $result->count();

        $offset = $this->calculateOffset($offset, 5, $total);

        return view('components.public.search')
            ->with('title', 'search')
            ->with('keywords', $keywords)
            ->with('offset', $offset)
            ->with('total', $total)
            ->with('posts', $result->skip($offset)->take(5));
    }
}
