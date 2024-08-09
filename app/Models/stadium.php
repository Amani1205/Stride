<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class stadium extends Model
{
    use HasFactory;
    protected $fillable =
    ['user_id','rate','capacity','time_slots','images'];

    protected $casts = [
        'time_slots' => 'array',
        'images' => 'array'
    ];
}
