<?php

namespace App\Models;

use App\Models\Interfaces\Likeable;
use App\Models\Traits\Likes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model implements Likeable
{
    use HasFactory, Likes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'author_id',
        'post_id',
        'content',
        'posted_at'
    ];

}
