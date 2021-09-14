<?php

namespace App\Models\traits;

/**
 * Trait SlugMake
 * @package App\Models\traits
 */
trait SlugMake
{
    /**
     * @param $value
     * @return string
     */
    public function slugMake($value): string
    {
        // Str::slug
        return strtolower(str_replace(' ', '-', $value));
    }
}
