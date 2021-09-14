<?php

namespace App\Models;

use App\Models\traits\SlugMake;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * Class Tag
 * @package App\Models
 */
class Tag extends Model
{
    // Traits
    use HasFactory, SlugMake;

    // Fillable
    protected $fillable = [
        'title',
        'slug'
    ];

    /**
     * @param $value
     */
    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = $this->slugMake($value);
    }

    /**
     * @return BelongsToMany
     */
    public function posts(): BelongsToMany
    {
        return $this->belongsToMany(Post::class);
    }
}
