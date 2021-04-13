<?php

namespace App\Models\Admin;

use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{
    use HasFactory;
    public $table = 'meals';

    protected $fillable = [
        'name', 'image', 'description', 'user_id','calories', 'price', 'sale_price', 'main_category_id', 'sub_category_id'
    ];
    public function getImageUrlAttribute()
    {
        if($this->image)
        {
            return asset('storage/'.$this->image);
        }
            return asset('images/defult.png');
    }
    
    public function getFinalPriceAttribute()
    {
        if ($this->sale_price > 0)
        {
            return $this->sale_price;
        }
        return $this->price;
    }

    public function maincategory()
    {
        return $this->belongsTo(MainCategory::class, 'main_category_id', 'id');
    }
    
    public function subcategory()
    {
        return $this->belongsTo(SubCategory::class, 'sub_category_id', 'id');
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class, 'order_meals')
        ->using(OrderMeal::class)
        ->withPivot([
            'price', 'quantity',
        ]);
    }

    public function user() 
    {
        return $this->belongsTo(User::class, 'user_id', 'id')->withDefault();
    }

    public function tags()
    {
        return $this->belongsToMany(
            Tag::class,         
            'meal_tag',      
            'meal_id',       
            'tag_id',           
            'id',               
            'id'                
        );
    }
}
