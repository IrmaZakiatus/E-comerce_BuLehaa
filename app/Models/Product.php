<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'description',
        'price',
        'sale_price',
        'sale_ends_at',
        'stock',
        'unit',
        'photo',
        'is_active',
        'is_flash_sale',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'is_flash_sale' => 'boolean',
        'price' => 'integer',
        'sale_price' => 'integer',
        'stock' => 'integer',
        'sale_ends_at' => 'datetime',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    public function getEffectivePriceAttribute(): int
    {
        if ($this->is_flash_sale && $this->sale_price && (! $this->sale_ends_at || $this->sale_ends_at->isFuture())) {
            return $this->sale_price;
        }

        return $this->price;
    }
}
