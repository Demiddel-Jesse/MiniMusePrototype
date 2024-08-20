<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
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
}
