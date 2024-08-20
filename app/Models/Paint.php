<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
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
}
