<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'internal_name',
        'defined_name',
        'public',
        'user_id'
    ];

    /**
     * Get the user that owns the Collection
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * The users_saved that belong to the Collection
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users_saved(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'user_saved_collection', 'collection_id', 'user_id')->withPivot(['public']);
    }

    /**
     * The posts that belong to the Collection
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function posts(): BelongsToMany
    {
        return $this->belongsToMany(Post::class, 'collection_has_post', 'collection_id', 'post_id');
    }
}
