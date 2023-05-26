<?php

namespace App\Http\Controllers\Marketplace;

use App\Http\Controllers\Controller;
use App\Models\Campaign;
use App\Models\Funding;
use App\Models\FundTransaction;
use Illuminate\Http\Request;

class ObligasiController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $campaigns = Campaign::all();
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
    public function buy_funding(Request $request){
        $fund_transaction = FundTransaction::create([
            'funding_id' => $request->funding_id,
            'to_id' => auth()->user()->id,
            'from_id' => $request->from_id,
        ]);
        Funding::find($request->funding_id)->update([
            'user_id' => auth()->user()->id,
            'status' => 'on_going',
        ]);
        
        return redirect()->route('invoice.obligasi',['id' =>$fund_transaction->id])->with('success','Berhasil membeli obligasi');
    }
    public function showInvoice ($id){
        $fund_transaction = FundTransaction::find($id);
        return view('dashboard.pages.marketplace.obligasi.invoice',['invoice' => $fund_transaction]);
    }
}
