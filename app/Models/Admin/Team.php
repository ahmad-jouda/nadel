<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    public $table = 'teams';
    protected $fillable = [
        'name', 'image', 'job_title_id', 'instagram', 'facebook', 'phone', 'twitter'
    ];

    public function jobtitle()
    {
        return $this->belongsTo(JobTitle::class, 'job_title_id', 'id');
    }

    public function getImageUrlAttribute()
    {
        if($this->image)
        {
            return asset('storage/'.$this->image);
        }
            return asset('images/defult.png');
    }
}
