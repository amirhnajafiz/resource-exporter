<?php

namespace App\Http\Controllers\traits\file;

use Illuminate\Support\Facades\Storage;

/**
 * Trait FileCreate
 * @package App\Http\Controllers\traits\file
 */
trait FileCreate
{
    /**
     * @param $root
     * @param $name
     * @param $content
     */
    public function storeFile($root, $name, $content)
    {
        Storage::disk('public')->putFileAs($root, $content, $name);
    }
}
