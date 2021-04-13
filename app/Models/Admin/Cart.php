<?php

namespace App\Models;

use App\Models\Admin\Meal;
use App\Traits\HasComposedKeys;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory, HasComposedKeys;

    public $incrementing = false;

    public $timestamps = false;

    protected $keyType = 'string';

    protected $primaryKey = ['id', 'meal_id'];

    protected $fillable = [
        'id', 'meal_id', 'quantity', 'user_id',
    ];

    public function meal() 
    {
        return $this->belongsTo(Meal::class, 'meal_id', 'id');
    }

    public function user() 
    {
        return $this->belongsTo(User::class, 'user_id', 'id')->withDefault();
    }

}
