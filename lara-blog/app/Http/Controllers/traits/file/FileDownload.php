<?php

namespace App\Http\Controllers\traits\file;

use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\StreamedResponse;

/**
 * Trait FileDownload
 * @package App\Http\Controllers\traits\file
 */
trait FileDownload
{
    /**
     * @param $path
     * @param $name
     * @return StreamedResponse
     */
    public function downloadFile($path, $name): StreamedResponse
    {
        return Storage::download($path, $name);
    }
}
