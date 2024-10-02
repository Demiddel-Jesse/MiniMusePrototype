<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Model;

class Paint extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'hexcode',
        'brand_id',
        'site_link',
        'created_by'
    ];

    /**
     * Get the paint_brand that owns the Paint
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function paint_brand(): BelongsTo
    {
        return $this->belongsTo(PaintBrand::class);
    }

    /**
     * Get the user that owns the Paint
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * The paint_block_lines that belong to the Paint
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function paint_block_lines(): BelongsToMany
    {
        return $this->belongsToMany(PaintBlockLine::class, 'paint_block_line_has_paint', 'paint_id', 'paint_block_line_id')->withPivot(['amount']);
    }

    /**
     * The posts that belong to the Paint
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function posts(): BelongsToMany
    {
        return $this->belongsToMany(Post::class, 'post_has_paint', 'paint_id', 'post_id');
    }

    /**
     * The paints that belong to the Paint
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function paints(): BelongsToMany
    {
        return $this->belongsToMany(Paint::class, 'paint_deltas', 'paint_id_1', 'paint_id_2')->withPivot(['delta']);
    }
}
