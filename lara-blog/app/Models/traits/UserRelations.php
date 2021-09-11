<?php

namespace App\Models\traits;

use App\Models\Like;
use App\Models\Love;
use App\Models\Post;
use App\Models\Save;

trait UserRelations
{
    public function posts(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Post::class);
    }

    public function likes(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Like::class);
    }

    public function loves(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Love::class);
    }

    public function saves(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Save::class);
    }
}
