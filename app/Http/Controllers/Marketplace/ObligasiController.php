<?php

namespace App\Http\Controllers\Marketplace;

use App\Http\Controllers\Controller;
use App\Models\Campaign;
use App\Models\Funding;
use App\Models\FundTransaction;
use Illuminate\Http\Request;

use function Spatie\Ignition\ErrorPage\report;

class ObligasiController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $campaigns = Campaign::all()->sortDesc();
        foreach ($campaigns as $campaign) {
            $campaign['total_fund'] = 0;
            if (count($campaign->fundings) !== 0) {
                # code...
                foreach ($campaign->fundings as $fund) {
                    # code...
                    $campaign['total_fund'] += $fund->fund_nominal;
                }
                $campaign['percentage'] = number_format(($campaign['total_fund'] / $campaign->fund_target) * 100, 2);
            }
        }
        return view('dashboard.pages.marketplace.obligasi.index', ['campaigns' => $campaigns]);
    }
    public function show($id)
    {
        $fundings = Funding::all()->where('campaign_id', $id)->where('status', 'on_sell');

        return view('dashboard.pages.marketplace.obligasi.detail', ['fundings' => $fundings]);
    }
    public function buy_funding(Request $request)
    {
        try {
            $funding = Funding::find($request->funding_id);

            if (auth()->user()->wallet->balance < $funding->price) {
                return redirect()->route('obligasi.index')->with('error', 'Saldo tidak mencukupi');
            }

            // transfer the money to previous owner
            auth()->user()->wallet->transfer($funding->user->wallet, $funding->price, "Pembelian Obligasi {$funding->campaign->title}");

            $transaction = $funding->transferTo(auth()->user(), $funding->price);

            return redirect()->route('invoice.obligasi', ['id' => $transaction->id])->with('success', 'Berhasil membeli obligasi');
        } catch (\Throwable $e) {
            return redirect()->route('obligasi.index')->with('error', $e->getMessage());
        }
    }
    public function showInvoice($id)
    {
        $fund_transaction = FundTransaction::find($id);
        return view('dashboard.pages.marketplace.obligasi.invoice', ['invoice' => $fund_transaction]);
    }
}
