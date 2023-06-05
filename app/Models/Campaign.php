<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    use CrudTrait;
    use HasFactory;

    protected $fillable = [
        'partner_id',
        'title',
        'slug',
        'description',
        'fund_target',
        'return_percentage',
        'tenor',
        'start_date',
        'finish_date',
        'status'
    ];

    public function __construct()
    {
        static::creating(function ($model) {
            $model->slug = str()->slug($model->title);
        });

        static::created(function ($model) {
            $model->wallet()->create();
        });

        static::deleting(function ($model) {
            $model->wallet()->delete();
        });
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function partner()
    {
        return $this->belongsTo(Partner::class);
    }

    public function documents()
    {
        return $this->morphMany(Document::class, 'documentable');
    }

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    public function reports()
    {
        return $this->hasMany(Report::class);
    }

    public function fundings()
    {
        return $this->hasMany(Funding::class);
    }

    public function wallet()
    {
        return $this->morphOne(Wallet::class, 'walletable');
    }

    public function getReturnTargetAttribute()
    {
        return $this->fund_target + ($this->fund_target * $this->return_percentage / 100);
    }
}
