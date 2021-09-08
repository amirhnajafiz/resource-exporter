<?php

namespace App\Http\Controllers\traits\user;

use Illuminate\Support\Facades\Auth;

trait Love
{
    public function love($id): \Illuminate\Http\JsonResponse
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
            'status' => 'OK'
        ]);
    }
}
