<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'email',
        'password',
        'profile_picture'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'admin',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * Get all of the posts for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }

    /**
     * Get all of the collections for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function collections(): HasMany
    {
        return $this->hasMany(Collection::class);
    }

    /**
     * Get all of the tags for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tags(): HasMany
    {
        return $this->hasMany(Tag::class);
    }

    /**
     * Get all of the comments for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * Get all of the paint_brands for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function paint_brands(): HasMany
    {
        return $this->hasMany(PaintBrand::class);
    }

    /**
     * Get all of the paints for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function paints(): HasMany
    {
        return $this->hasMany(Paint::class);
    }

    /**
     * The saved_collections that belong to the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function saved_collections(): BelongsToMany
    {
        return $this->belongsToMany(Collection::class, 'user_saved_collection', 'user_id', 'collection_id')->withPivot(['public']);
    }

    /**
     * The liked_comments that belong to the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function liked_comments(): BelongsToMany
    {
        return $this->belongsToMany(Comment::class, 'user_likes_comment', 'user_id', 'comment_id');
    }

    /**
     * The viewed_and_liked_posts that belong to the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function viewed_and_liked_posts(): BelongsToMany
    {
        return $this->belongsToMany(Post::class, 'user_viewed_and_liked_post', 'user_id', 'post_id')->withPivot(['liked']);
    }
}
