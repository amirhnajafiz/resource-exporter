<?php

namespace App\Http\Controllers\traits\user\features;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

/**
 * Trait Save
 * @package App\Http\Controllers\traits\user\features
 */
trait Save
{
    /**
     * @param $id
     * @return JsonResponse
     */
    public function save($id): JsonResponse
    {
        $result = \App\Models\Save::query()
            ->where('user_id', '=', Auth::id())
            ->where('post_id', '=', $id)
            ->get();

        $status = 'Unsaved';

        if (count($result) > 0) {
            $result[0]->delete();
        } else {
            \App\Models\Save::query()->create([
                'user_id' => Auth::id(),
                'post_id' => $id
            ]);
            $status = 'Saved';
        }

        return response()->json([
            'status'=> $status
        ]);
    }
}

