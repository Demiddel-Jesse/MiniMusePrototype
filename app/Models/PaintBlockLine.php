<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Model;

class PaintBlockLine extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'layer_name',
        'paint_block_id'
    ];

    /**
     * Get the paint_block that owns the PaintBlockLine
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function paint_block(): BelongsTo
    {
        return $this->belongsTo(PaintBlock::class);
    }

    /**
     * The paints that belong to the PaintBlockLine
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function paints(): BelongsToMany
    {
        return $this->belongsToMany(Paint::class, 'paint_block_line_has_paint', 'paint_block_line_id', 'paint_id')->withPivot(['amount']);
    }
}
