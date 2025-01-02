<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InCome extends Model
{
    use HasFactory;
    protected $table = 'in_come';
    protected $fillable = [
        'date',
        'price',
        'id'
    ];

    protected $casts = [
        'created_at'=> 'datetime:Y-m-d',
        'updated_at' => 'datetime:Y-m-d'
    ];
}
