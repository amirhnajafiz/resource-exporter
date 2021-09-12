<?php

namespace App\Http\Controllers\traits\file;

use Illuminate\Support\Facades\Storage;

trait FileCreate
{
    public function storeFile($root, $name, $content)
    {
        Storage::disk('public')->putFileAs($root, $content, $name);
    }
}
