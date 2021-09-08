<?php

namespace App\Http\Controllers\traits\user;

use Illuminate\Support\Facades\Auth;

trait Save
{
    public function save($id): \Illuminate\Http\JsonResponse
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

