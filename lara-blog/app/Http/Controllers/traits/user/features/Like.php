<?php

namespace App\Http\Controllers\traits\user\features;

use App\Models\Post;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

/**
 * Trait Like
 * @package App\Http\Controllers\traits\user\features
 */
trait Like
{
    /**
     * @param $id
     * @return JsonResponse
     */
    public function like($id): JsonResponse
    {
        $result = \App\Models\Like::query()
            ->where('user_id', '=', Auth::id())
            ->where('post_id', '=', $id)
            ->get();

        if (count($result) > 0) {
            $result[0]->delete();
        } else {
            \App\Models\Like::query()->create([
                'user_id' => Auth::id(),
                'post_id' => $id
            ]);
        }

        return response()->json([
            'total'=> Post::query()->find($id)->likes->count()
        ]);
    }
}
