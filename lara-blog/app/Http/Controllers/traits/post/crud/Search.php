<?php

namespace App\Http\Controllers\traits\post\crud;

use App\Http\Controllers\traits\Offset;
use App\Http\Requests\SearchRequest;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

/**
 * Trait Search
 * @package App\Http\Controllers\traits\post\crud
 */
trait Search
{
    // Traits
    use Offset;

    /**
     * @param SearchRequest $request
     * @param int $offset
     * @return Application|Factory|View
     */
    public function search(SearchRequest $request, $offset = 0)
    {
        $validated = $request->validated();
        $keywords = explode("|", $validated['keyword']);

        $result = Tag::all()->concat(Category::all());

        // Searching each key and intersect the new ones with old ones
        foreach ($keywords as $keyword) {
            $tag = Tag::query()->where('title', '=', $keyword)->first();
            $category = Category::query()->where('title', '=', $keyword)->first();

            $tags = $tag ? $tag->posts : collect([]);
            $categories = $category ? $category->posts : collect([]);

            $result = $result->intersect($tags->concat($categories));
        }

        $total = $result->count();
        $offset = $this->calculateOffset($offset, 5, $total);  // Offset validation

        return view('components.public.search')
            ->with('title', 'search')
            ->with('keywords', $keywords)
            ->with('offset', $offset)
            ->with('total', $total)
            ->with('posts', $result->skip($offset)->take(5));
    }
}
