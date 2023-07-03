<?php

namespace App\Http\Controllers\Marketplace;

use App\Http\Controllers\Controller;
use App\Models\Campaign;
use App\Models\Funding;
use App\Models\FundTransaction;
use App\Notifications\CampaignFullyFunded;
use App\Notifications\CampaignFunded;
use Illuminate\Http\Request;

class MitraController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $campaigns = Campaign::orderBy('updated_at',"DESC")->paginate(6);
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
        return view('dashboard.pages.marketplace.mitra.index', ['campaigns' => $campaigns]);
    }
    public function show($id)
    {
        $campaign = Campaign::find($id);
        $campaign['total_fund'] = 0;
        if (count($campaign->fundings) !== 0) {
            # code...

            foreach ($campaign->fundings as $fund) {
                # code...
                $campaign['total_fund'] += $fund->fund_nominal;
            }
        }
        $campaign['percentage'] = number_format(($campaign['total_fund'] / $campaign->fund_target) * 100, 2);
        return view('dashboard.pages.marketplace.mitra.detail', ['campaign' => $campaign]);
    }
    public function fund(Request $request, $id)
    {
        $user = auth()->user();
        $fund_nominal = $request->amount;

        if ($user->wallet->balance < $fund_nominal) {
            return redirect()->back()->with('error', 'Saldo tidak cukup');
        }

        $campaign = Campaign::find($id);

        if ($campaign->status !== 'funding_open') {
            return redirect()->back()->with('error', 'Campaign tidak aktif');
        }
        if ($campaign->wallet->balance + $fund_nominal > $campaign->fund_target) {
            return redirect()->back()->with('error', 'Dana yang terkumpul melebihi target');
        }

        $funding = $campaign->fundings()->create([
            'user_id' => auth()->user()->id,
            'fund_nominal' => $request->amount,
        ]);
        // transfer
        $user->wallet->transfer($campaign->wallet, $fund_nominal, 'Pendanaan ' . $campaign->title);

        $fundingTransaction = $funding->transactions()->create([
            'from_id' => $campaign->partner->user_id,
            'to_id' => auth()->user()->id,
            'value' =>  $request->amount,
        ]);

        $campaign->partner->user->notify(new CampaignFunded($funding));

        if ($campaign->wallet->balance === $campaign->fund_target) {
            $campaign->update([
                'status' => 'waiting_for_disbursement',
            ]);

            $campaign->partner->user->notify(new CampaignFullyFunded($campaign));
        }

        return redirect()->route('invoice', ['id' => $fundingTransaction->id]);
    }
    public function showInvoice(Request $request)
    {
        $fund_transaction = FundTransaction::find($request->id);
        return view('dashboard.pages.invoice', ['invoice' => $fund_transaction, 'type' => 'mitra']);
    }
}
