<?php

namespace App\Models\Admin;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;
    public $table = 'sub_categories';

    protected $fillable = [
        'name', 'image', 'description', 'user_id', 'main_category_id'
    ];

    public function getImageUrlAttribute()
    {
        if($this->image)
        {
            return asset('storage/'.$this->image);
        }
            return asset('images/defult.png');
    }

    public function maincategory()
    {
        return $this->belongsTo(MainCategory::class, 'main_category_id', 'id');
    }
    
    public function meals()
    {
        return $this->hasMany(Meal::class, 'sub_category_id', 'id');
    }

    public function user() 
    {
        return $this->belongsTo(User::class, 'user_id', 'id')->withDefault();
    }
}
