<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'description',
        'price',
        'image',
        'stock',
        'is_active',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'price' => 'decimal:2',
        'is_active' => 'boolean',
    ];

    // Scope untuk produk aktif
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    // Scope untuk produk tersedia (stock > 0)
    public function scopeAvailable($query)
    {
        return $query->where('stock', '>', 0);
    }
}
