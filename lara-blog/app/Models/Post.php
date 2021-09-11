<?php

namespace App\Models;

use App\Models\traits\PostRelations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes, PostRelations;

    protected $fillable = [
        'title',
        'content',
        'user_id'
    ];
}
