<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'ingredients',
        'steps',
        'cooking_time',
        'photo',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'cooking_time' => 'integer',
    ];
}
