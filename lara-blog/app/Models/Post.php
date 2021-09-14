<?php

namespace App\Models;

use App\Models\traits\PostRelations;
use App\Models\traits\SlugMake;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Post
 * @package App\Models
 */
class Post extends Model
{
    // Traits
    use HasFactory, SlugMake;
    use SoftDeletes, PostRelations;

    // Fillable
    protected $fillable = [
        'title',
        'content',
        'slug',
        'allow_comments',
        'allow_download',
        'published',
        'user_id'
    ];

    /**
     * @param $value
     */
    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = $this->slugMake($value);
    }
}
