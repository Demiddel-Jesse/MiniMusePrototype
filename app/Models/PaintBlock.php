<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class PaintBlock extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'community_made',
        'votes',
        'post_id',
        'created_by'
    ];

    /**
     * Get all of the paint_block_lines for the PaintBlock
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function paint_block_lines(): HasMany
    {
        return $this->hasMany(PaintBlockLine::class);
    }

    /**
     * Get the post that owns the PaintBlock
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class);
    }

    /**
     * The user_votes that belong to the PaintBlock
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function user_votes(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'user_voted_paint_block', 'paint_block_id', 'user_id');
    }
}
