<?php

namespace App\Models\Admin;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MainCategory extends Model
{
    use HasFactory;
    public $table = 'main_categories';

    protected $fillable = [
        'name', 'image', 'description', 'user_id'
    ];

    public function getImageUrlAttribute()
    {
        if($this->image)
        {
            return asset('storage/'.$this->image);
        }
            return asset('images/defult.png');
    }
    public function subcategories()
    {
        return $this->hasMany(SubCategory::class, 'main_category_id', 'id');
    }
    public function meals()
    {
        return $this->hasMany(Meal::class, 'main_category_id', 'id');
    }

    public function user() 
    {
        return $this->belongsTo(User::class, 'user_id', 'id')->withDefault();
    }
}
