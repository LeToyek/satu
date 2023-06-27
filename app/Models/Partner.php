<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Partner extends Model
{
    use CrudTrait;
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'address',
        'found_at',
        'sector',
        'monthly_income',
        'grade',
        'verified_at'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function image(): MorphOne
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function documents(): MorphMany
    {
        return $this->morphMany(Document::class, 'documentable');
    }

    public function campaigns()
    {
        return $this->hasMany(Campaign::class);
    }

    public function getIsVerifiedAttribute()
    {
        return $this->verified_at != null;
    }

    public function verify()
    {
        $this->update(['verified_at' => now()]);
    }

    public function unverify()
    {
        $this->update(['verified_at' => null]);
    }

    // BACKPACK
    public function identifiableAttribute()
    {
        return 'name';
    }

    public function verifyButton()
    {
        if ($this->is_verified) {
            return '<a href="' . backpack_url('partner/' . $this->id . '/unverify') . '" class="btn btn-sm btn-link-secondary"><i class="la la-times"></i> Batalkan Verifikasi</a>';
        }

        return '<a href="' . backpack_url('partner/' . $this->id . '/verify') . '" class="btn btn-sm btn-link"><i class="la la-check"></i> Verifikasi</a>';
    }
}
