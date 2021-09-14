<?php

namespace App\Http\Controllers\traits\user\features;

use App\Models\Post;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

/**
 * Trait Love
 * @package App\Http\Controllers\traits\user\features
 */
trait Love
{
    /**
     * @param $id
     * @return JsonResponse
     */
    public function love($id): JsonResponse
    {
        $result = \App\Models\Love::query()
            ->where('user_id', '=', Auth::id())
            ->where('post_id', '=', $id)
            ->get();

        if (count($result) > 0) {
            $result[0]->delete();
        } else {
            \App\Models\Love::query()->create([
                'user_id' => Auth::id(),
                'post_id' => $id
            ]);
        }

        return response()->json([
            'total'=> Post::query()->find($id)->loves->count()
        ]);
    }
}
