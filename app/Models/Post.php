<?php

namespace App\Models;

use App\Models\Interfaces\Likeable;
use App\Models\Traits\Likes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model implements Likeable
{
    use Likes, HasFactory;

    protected  $table = "posts";

    protected $fillable = ['title', 'content', 'posted_at', 'published', 'author_id', 'thumbnail_id'];

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

    public function isPublished(): bool
    {
        return filled($this->published);
    }

    public function thumbnail(): BelongsTo
    {
        return $this->belongsTo(Image::class, 'thumbnail_id');
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
