<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class coach extends Model
{
    use HasFactory;

    protected $fillable =
    ['user_id','rate','time_slots'];

    protected $casts = [
        'time_slots' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
