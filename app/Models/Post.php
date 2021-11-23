<?php

namespace App\Models;

use App\Models\Interfaces\Likeable;
use App\Models\Traits\Likes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model implements Likeable
{
    use Likes, HasFactory;

    protected $fillable = ['title', 'content', 'posted_at', 'auhtor_id', 'thumbnail_id'];

    /**
     * @var array
     */
    protected $dates = [
        'posted_at'
    ];

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function thumbnail(): BelongsTo
    {
        return $this->belongsTo(Image::class);
    }

    public function comments(): HasMany
    {
        return $this->HasMany(Comment::class);
    }

    public function hasThumbnail(): bool
    {
        return filled($this->thumbnail_id);
    }
}
