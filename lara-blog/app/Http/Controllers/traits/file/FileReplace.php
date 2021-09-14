<?php

namespace App\Http\Controllers\traits\file;

use Illuminate\Support\Facades\Storage;

/**
 * Trait FileReplace
 * @package App\Http\Controllers\traits\file
 */
trait FileReplace
{
    // Traits
    use FileCreate, FileDestroy;

    /**
     * @param $root
     * @param $name
     * @param $content
     * @param string $old
     */
    public function replaceFile($root, $name, $content, $old = '')
    {
        if (Storage::disk('public')->exists($old)) {
            $this->destroyFile($old);
        }
        $this->storeFile($root, $name, $content);
    }
}
