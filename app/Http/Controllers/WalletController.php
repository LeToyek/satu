<?php

namespace App\Http\Controllers;

use App\Models\Funding;
use App\Models\FundTransaction;
use App\Models\Transaction;
use App\Models\Wallet;
use Illuminate\Http\Request;

class WalletController extends Controller
{
    //
    function index()
    {
        $user = auth()->user();
        $wallet = $user->wallet;
        $fundings = Funding::all()->where('user_id', $user->id);
        $transactions = Transaction::all()->where('to_wallet_id', $user->wallet->id)->where('type', 'transfer');

        $estimations = 0;
        $keuntungan = 0;
        foreach ($fundings as $funding) {
            if ($funding->status == 'on_sell') {
                $estimations += $funding->price;
                continue;
            }
            if ($funding->status == 'on_going') {
                $surplus = $funding->fund_nominal * $funding->campaign->return_percentage/100;
                $estimations += $funding->fund_nominal + $surplus;
                continue;
            }
        }
        if ($user->role == 'funder') {
            # code...
            
            foreach ($transactions as $transaction) {
                if ($transaction->description) {
                    $keuntungan += $transaction->amount;
                }
            }
            return view('dashboard.pages.wallet.index', ['wallet' => $wallet, 'fundings' => $fundings, 'keuntungan' => $keuntungan, 'estimations' => $estimations]);
        }

    }
    function topup(Request $request){
        if ($request->amount == 0) {
            return redirect()->route('wallet.index')->with('error', 'Jumlah topup tidak boleh 0');
        }
        $user = auth()->user();
        $wallet = $user->wallet;
        $wallet->deposit($request->amount);
        return redirect()->route('wallet.index')->with('success', 'Topup berhasil');
    }
}
