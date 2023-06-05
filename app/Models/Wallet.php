<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Support\Facades\DB;

class Wallet extends Model
{
    use CrudTrait;
    use HasFactory;

    protected $fillable = [
        'walletable_id',
        'walletable_type',
        'balance'
    ];

    public function walletable(): MorphTo
    {
        return $this->morphTo();
    }

    public function outTransactions()
    {
        return $this->hasMany(Transaction::class, 'from_wallet_id');
    }

    public function inTransactions()
    {
        return $this->hasMany(Transaction::class, 'to_wallet_id');
    }

    public function getTransactionsAttribute()
    {
        return $this->outTransactions->merge($this->inTransactions);
    }

    // methods
    public function transfer(Wallet $wallet, int $amount, string $description = null)
    {
        if ($this->balance < $amount) {
            throw new \Exception('Insufficient funds');
        }

        DB::transaction(function () use ($wallet, $amount, $description) {
            $this->decrement('balance', $amount);
            $wallet->increment('balance', $amount);
            $this->outTransactions()->create([
                'to_wallet_id' => $wallet->id,
                'amount' => $amount,
                'type' => 'transfer',
                'description' => $description
            ]);
        });
    }

    public function deposit(int $amount)
    {
        if ($amount < 0) {
            throw new \Exception('Invalid amount');
        }

        DB::transaction(function () use ($amount) {
            $this->increment('balance', $amount);
            $this->inTransactions()->create([
                'from_wallet_id' => $this->id,
                'amount' => $amount,
                'type' => 'deposit'
            ]);
        });
    }

    public function withdraw(int $amount)
    {
        if ($this->balance < $amount) {
            throw new \Exception('Insufficient funds');
        }

        DB::transaction(function () use ($amount) {
            $this->decrement('balance', $amount);
            $this->outTransactions()->create([
                'to_wallet_id' => $this->id,
                'amount' => $amount,
                'type' => 'withdraw'
            ]);
        });
    }
}
