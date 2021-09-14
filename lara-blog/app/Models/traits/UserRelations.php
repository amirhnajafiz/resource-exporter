<?php

namespace App\Models\traits;

use App\Models\Like;
use App\Models\Love;
use App\Models\Post;
use App\Models\Save;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Trait UserRelations
 * @package App\Models\traits
 */
trait UserRelations
{
    /**
     * @return HasMany
     */
    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }

    /**
     * @return HasMany
     */
    public function likes(): HasMany
    {
        return $this->hasMany(Like::class);
    }

    /**
     * @return HasMany
     */
    public function loves(): HasMany
    {
        return $this->hasMany(Love::class);
    }

    /**
     * @return HasMany
     */
    public function saves(): HasMany
    {
        return $this->hasMany(Save::class);
    }
}
