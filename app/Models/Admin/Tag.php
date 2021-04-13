<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public function meals()
    {
        return $this->belongsToMany(
            Meal::class,     
            'meal_tag',      
            'tag_id',           
            'meal_id',       
            'id',               
            'id'                
        );
    }
}
