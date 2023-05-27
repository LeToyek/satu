<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Funding extends Model
{
    use HasFactory;

    protected $fillable = [
        'campaign_id',
        'user_id',
        'fund_nominal',
        'price',
        'status'
    ];

    public function campaign()
    {
        return $this->belongsTo(Campaign::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function transactions()
    {
        return $this->hasMany(FundTransaction::class);
    }

    // NOTE!! this only transfer the ownership of the funding
    // handle the money transfer separately, using wallet->transfer()
    public function transferTo(User $user, int $value)
    {
        if ($user->id == $this->user_id) {
            throw new \Exception('Cannot transfer to the same user');
        }

        DB::transaction(function () use ($user, $value) {
            $oldUserId = $this->user_id;

            $this->update([
                'user_id' => $user->id,
            ]);

            $this->transactions()->create([
                'from_id' => $oldUserId,
                'to_id' => $user->id,
                // 'value' => $value,
            ]);
        });
    }
}
