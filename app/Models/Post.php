<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'description',
        'published',
        'public',
        'user_id',
        'NSFW',
    ];

    /**
     * Get all of the images for the Post
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function images(): HasMany
    {
        return $this->hasMany(Image::class);
    }

    /**
     * Get all of the comments for the Post
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * Get all of the paintBlocks for the Post
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function paintBlocks(): HasMany
    {
        return $this->hasMany(PaintBlock::class);
    }

    /**
     * Get the user that owns the Post
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * The collections that belong to the Post
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function collections(): BelongsToMany
    {
        return $this->belongsToMany(Collection::class, 'collection_has_post', 'post_id', 'collection_id');
    }

    /**
     * The users_viewed_and_liked that belong to the Post
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users_viewed_and_liked(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'user_viewed_and_liked_post', 'post_id', 'user_id')->withPivot(['liked']);
    }

    /**
     * The tags that belong to the Post
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class, 'post_has_tag', 'post_id', 'tag_id');
    }

    /**
     * The paints that belong to the Post
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function paints(): BelongsToMany
    {
        return $this->belongsToMany(Paint::class, 'post_has_paint', 'post_id', 'paint_id');
    }
}
