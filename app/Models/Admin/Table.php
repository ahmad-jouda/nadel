<?php

namespace App\Models\Admin;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    use HasFactory;

    public $table = 'tables';
    protected $fillable = [
        'description', 'table_type', 'user_id', 'qr_code', 'status'];

        public function user() 
    {
        return $this->belongsTo(User::class, 'user_id', 'id')->withDefault();
    }
}
