<?php

namespace App\Http\Controllers\traits\post;

use App\Http\Controllers\traits\file\FileDownload;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\StreamedResponse;

/**
 * Trait PostImageDownload
 * @package App\Http\Controllers\traits\post
 */
trait PostImageDownload
{
    // Traits
    use FileDownload;

    /**
     * @param $id
     * @return RedirectResponse|StreamedResponse
     */
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
