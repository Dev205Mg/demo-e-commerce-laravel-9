<?php

namespace App\Models;

use App\Models\Order;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description', 'price', 'image'];
    
    public function orders(): BelongsToMany
    {
        return $this->belongsToMany(Order::class)->withPivot('total_quantity', 'total_price');
    }

    // public function price(): Attribute
    // {
    //     return Attribute::make(
    //         get:fn($value) => number_format($value, 0, ',', ' '). ' Ar'
    //     );
    // }

    public function getFormattedPriceAttribute() :string
    {
        return number_format($this->price, 0, ',', ' '). ' Ar';
    }
}
