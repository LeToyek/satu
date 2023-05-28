<?php

namespace App\Http\Controllers\Marketplace;

use App\Http\Controllers\Controller;
use App\Models\Campaign;
use App\Models\Funding;
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
        $funding = Funding::create([
            'campaign_id' => $id,
            'user_id' => auth()->user()->id,
            'fund_nominal' => $request->amount,
        ]);
        return redirect()->route('invoice', ['funding' => $funding]);
    }
    public function showInvoice(Request $request)
    {
        $funding = Funding::find($request->funding);
        return view('dashboard.pages.marketplace.mitra.checkout', ['funding' => $funding]);
    }
}
