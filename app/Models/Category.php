<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;

use App\Models\Product;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
    ];

    // у одной категории может быть много продуктов
    // belongsToMany - многие ко многим
    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class);
    }
}
