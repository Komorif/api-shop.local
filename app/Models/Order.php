<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\belongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

use App\Models\User;
use App\Models\Product; 

class Order extends Model
{
    use HasFactory;

    // У одного заказа может быть только 1 пользователь
    // belongsTo - один ко многим
    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // У заказов может быть много продуктов
    // belongsToMany -  многие ко многим
    public function products(): belongsToMany
    {
        return $this->belongsToMany(Product::class);
    }
}
