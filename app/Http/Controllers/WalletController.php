<?php

namespace App\Http\Controllers;

use App\Models\Funding;
use App\Models\FundTransaction;
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
        $transactions = FundTransaction::all()->where('to_id', $user->id);

        $estimations = 0;
        foreach ($fundings as $funding) {
            $surplus = $funding->fund_nominal * $funding->campaign->return_percentage/100;
            $estimations += $funding->fund_nominal + $surplus;
        }

        return view('dashboard.pages.wallet.index', ['wallet' => $wallet, 'fundings' => $fundings, 'transactions' => $transactions, 'estimations' => $estimations]);
    }
    function topup(Request $request){
        if ($request->amount == 0) {
            return redirect()->route('wallet.index')->with('error', 'Jumlah topup tidak boleh 0');
        }
        $user = auth()->user();
        $wallet = $user->wallet;
        $wallet->balance += $request->amount;
        $wallet->save();
        return redirect()->route('wallet.index')->with('success', 'Topup berhasil');
    }
}
