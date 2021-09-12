<?php

namespace App\Http\Controllers\traits\file;

use Illuminate\Support\Facades\Storage;

trait FileDestroy
{
    public function destroyFile($name)
    {
        Storage::disk('public')->delete($name);
    }
}
