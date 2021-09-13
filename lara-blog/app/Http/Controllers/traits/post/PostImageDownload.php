<?php

namespace App\Http\Controllers\traits\post;

use App\Http\Controllers\traits\file\FileDownload;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;

trait PostImageDownload
{
    use FileDownload;

    public function downloadPostImage($id)
    {
        $post = Post::query()->findOrFail($id);
        $image = $post->image;
        if ($image && Storage::disk('public')->exists($image->path)) {
            $name = $post->slug;
            return $this->downloadFile($image->path, $name);
        } else {
            return redirect()->back();
        }
    }
}
