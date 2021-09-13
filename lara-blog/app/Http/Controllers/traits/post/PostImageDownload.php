<?php

namespace App\Http\Controllers\traits\post;

use App\Http\Controllers\traits\file\FileDownload;
use App\Models\Post;

trait PostImageDownload
{
    use FileDownload;

    public function downloadPostImage($id)
    {
        $post = Post::query()->findOrFail($id);
        if ($post->image) {
            $name = $post->slug;
            return $this->downloadFile($post->image->path, $name);
        } else {
            return redirect()->back();
        }
    }
}
