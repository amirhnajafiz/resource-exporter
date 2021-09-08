<?php

namespace App\Http\Controllers\traits\user;

use Illuminate\Support\Facades\Auth;

trait Like
{
    public function like($id): \Illuminate\Http\JsonResponse
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
            'total'=> \App\Models\Post::query()->find($id)->likes->count()
        ]);
    }
}
