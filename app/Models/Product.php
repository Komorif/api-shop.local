<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\Category;
use App\Models\Order;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'image_url',
    ];


    // У одного продукта может только 1 категория
    // belongsToMany - многие ко многим
    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }

    // У одного продукта может быть много заказов
    // belongsToMany - многие ко многим
    public function orders(): BelongsToMany
    {
        return $this->belongsToMany(Order::class);
    }

}
