<?php

namespace App\Models;

use App\Models\Admin\Meal;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;

class OrderMeal extends Pivot
{
    use HasFactory;

    public $table = 'order_meals';

    protected $fillable = [
        'order_id', 'meal_id', 'price', 'quantity'
    ];

    public $timestamps = false;

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id', 'id');
    }
    public function meal()
    {
        return $this->belongsTo(Meal::class, 'meal_id', 'id');
    }
}
