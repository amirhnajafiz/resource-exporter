<?php

namespace App\Http\Controllers\traits\file;

use Illuminate\Support\Facades\Storage;

trait FileReplace
{
    use FileCreate, FileDestroy;

    public function replaceFile($root, $name, $content, $old = '')
    {
        if (Storage::disk('public')->exists($old)) {
            $this->destroyFile($old);
        }
        $this->storeFile($root, $name, $content);
    }
}
