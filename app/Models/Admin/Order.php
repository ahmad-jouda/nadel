<?php

namespace App\Models;

use App\Models\Admin\Meal;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public $table = 'orders';
    
    protected $fillable = [
        'user_id', 'total', 'status',
    ];

    public function items() 
    {
        return $this->hasMany(OrderMeal::class, 'order_id', 'id');
    }

    public function meals()
    {
        return $this->belongsToMany(Meal::class, 'order_meals')
        ->using(OrderMeal::class)
        ->withPivot([
            'price', 'quantity',
        ]);
    }
}
