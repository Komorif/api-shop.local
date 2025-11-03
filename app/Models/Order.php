<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\HasMany;
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

    // У одного заказа может быть много продуктов
    // hasMany -  один ко многим
    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}
