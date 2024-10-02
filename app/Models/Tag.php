<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'tag_type_id',
        'created_by',
        'hexcode'
    ];

    /**
     * Get the user that owns the Tag
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the tag_type that owns the Tag
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tag_type(): BelongsTo
    {
        return $this->belongsTo(TagType::class);
    }

    /**
     * The posts that belong to the Tag
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function posts(): BelongsToMany
    {
        return $this->belongsToMany(Post::class, 'post_has_tag', 'tag_id', 'post_id');
    }
}
