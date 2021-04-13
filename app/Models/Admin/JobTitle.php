<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobTitle extends Model
{
    use HasFactory;
    public $table = 'job_titles';
    protected $fillable = ['job_title'];


    public function teams()
    {
        return $this->hasMany(Team::class, 'job_title_id', 'id');
    }
}
