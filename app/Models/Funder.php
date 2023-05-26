<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Funder extends Model
{
    use HasFactory;

    public $fillable = [
        'ksei_number'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
