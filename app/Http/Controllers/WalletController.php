<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\Funding;
use App\Models\FundTransaction;
use App\Models\Transaction;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WalletController extends Controller
{
    //
    function index()
    {
        $user = auth()->user();
        $wallet = $user->wallet;
        $transactions = Transaction::all()->where('to_wallet_id', $user->wallet->id)->where('type', 'transfer');

        $fundings = Funding::all()->where('user_id', $user->id);
        $estimations = 0;
        $keuntungan = 0;
        if ($user->role == 'funder') {
            # code...
            foreach ($fundings as $funding) {
                if ($funding->status == 'on_sell') {
                    $estimations += $funding->price;
                    continue;
                }
                if ($funding->status == 'on_going') {
                    $surplus = $funding->fund_nominal * $funding->campaign->return_percentage / 100;
                    $estimations += $funding->fund_nominal + $surplus;
                    continue;
                }
            }

            foreach ($transactions as $transaction) {
                if ($transaction->description) {
                    $keuntungan += $transaction->amount;
                }
            }
            return view('dashboard.pages.wallet.index', ['wallet' => $wallet, 'fundings' => $fundings, 'keuntungan' => $keuntungan, 'estimations' => $estimations]);
        }
        if ($user->role == 'partner') {
            # code...
            $fundings;


            $fundings = Funding::select('fundings.*', DB::raw('SUM(fundings.fund_nominal) as fundTot'))
                ->join('campaigns', 'campaigns.id', '=', 'fundings.campaign_id')
                ->join('partners', 'partners.id', '=', 'campaigns.partner_id')
                ->where('partners.user_id', auth()->user()->id)
                ->groupBy(DB::raw('DATE(fundings.created_at), partners.user_id'))
                ->get();

            $estimations = auth()->user()->details->campaigns->sum(function ($campaign) {
                if ($campaign->status == 'on_going') {
                    return $campaign->fundings->sum('fund_nominal');
                }

                return 0;
            });
            return view('dashboard.pages.wallet.index', ['wallet' => $wallet, 'fundings' => $fundings, 'keuntungan' => $keuntungan, 'estimations' => $estimations]);
        }
    }
    function topup(Request $request)
    {
        if ($request->amount == 0) {
            return redirect()->route('wallet.index')->with('error', 'Jumlah topup tidak boleh 0');
        }
        $user = auth()->user();
        $wallet = $user->wallet;
        $wallet->deposit($request->amount);
        return redirect()->route('wallet.index')->with('success', 'Topup berhasil');
    }
}
