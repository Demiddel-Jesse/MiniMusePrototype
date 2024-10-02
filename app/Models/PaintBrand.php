<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class PaintBrand extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'site_link'
    ];

    /**
     * Get all of the paints for the PaintBrand
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function paints(): HasMany
    {
        return $this->hasMany(Paint::class);
    }

    /**
     * Get the user that owns the PaintBrand
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
