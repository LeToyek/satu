<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use CrudTrait;
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'address',
        'gender',
        'birth_date',
        'role',
        'no_hp'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'birth_date' => 'date'
    ];

    public function __construct()
    {
        static::created(function ($user) {
            if (!$user->avatar) {
                $user->avatar()->create();
            }
            if (!$user->wallet) {
                $user->wallet()->create();
            }
        });
    }

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }

    public function avatar(): MorphOne
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function wallet()
    {
        return $this->morphOne(Wallet::class, 'walletable');
    }

    public function details()
    {
        if ($this->role === 'admin') {
            return $this->hasOne(Admin::class);
        } else if ($this->role === 'partner') {
            return $this->hasOne(Partner::class);
        } else if ($this->role === 'funder') {
            return $this->hasOne(Funder::class);
        }
    }
    public function getAvatarUrlAttribute()
    {
        // dd($this->avatar->path);
        if ($this->avatar->path != null) {
            # code...
            return $this->avatar->url;
        }
        return "https://ui-avatars.com/api/?name=" . $this->name . "&background=02A95C&color=fff";
    }
    public function getRoleStringAttribute()
    {
        if ($this->role === 'admin') {
            return 'Admin';
        } else if ($this->role === 'partner') {
            return 'Mitra';
        } else if ($this->role === 'funder') {
            return 'Pendana';
        }
    }
}
