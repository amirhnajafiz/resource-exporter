<?php

namespace App\Http\Controllers\traits\file;

use Illuminate\Support\Facades\Storage;

trait FileCreate
{
    public function storeFile($root, $name, $content)
    {
        $disk = Storage::build([
            'driver' => 'local',
            'root' => $root
        ]);

        $disk->put($name, $content);
    }
}
