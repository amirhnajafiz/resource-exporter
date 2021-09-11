<?php

namespace App\Models\traits;

trait SlugMake
{
    public function slugMake($value): string
    {
        return strtolower(str_replace(' ', '-', $value));
    }
}
