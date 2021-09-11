<?php

namespace App\Models;

use App\Models\traits\PostRelations;
use App\Models\traits\SlugMake;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory, SlugMake;
    use SoftDeletes, PostRelations;

    protected $fillable = [
        'title',
        'content',
        'slug',
        'user_id'
    ];

    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = $this->slugMake($value);
    }
}
