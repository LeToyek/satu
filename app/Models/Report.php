<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $fillable = [
        'campaign_id',
        'title',
        'brief',
        'description'
    ];

    public function documents()
    {
        return $this->morphMany(Document::class, 'documentable');
    }

    public function campaign()
    {
        return $this->belongsTo(Campaign::class);
    }
}
