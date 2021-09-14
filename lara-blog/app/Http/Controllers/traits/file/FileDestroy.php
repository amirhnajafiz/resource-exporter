<?php

namespace App\Http\Controllers\traits\file;

use Illuminate\Support\Facades\Storage;

/**
 * Trait FileDestroy
 * @package App\Http\Controllers\traits\file
 */
trait FileDestroy
{
    /**
     * @param $name
     */
    public function destroyFile($name)
    {
        Storage::disk('public')->delete($name);
    }
}
