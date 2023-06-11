<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\Funding;
use App\Notifications\CampaignFunded;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $user = auth()->user();
        if ($user->role === 'funder') {
            # code...
            $total_fund = 0;
            $total_obligasi = 0;
            $estimations = 0;
            $fundings = Funding::where('user_id',$user->id)->get();
            $topCampaign = Campaign::orderBy('created_at', 'desc')->take(3)->get();
            $totalPendapatan = 0;
            foreach (auth()->user()->wallet->transactions as $transaction) {
                if ($transaction->to_wallet_id == auth()->user()->wallet->id && $transaction->type != 'deposit') {
                    $totalPendapatan += $transaction->amount;
                }
            }
            if ($fundings) {
            $total_obligasi = $fundings->count();
                foreach ($fundings as $funding) {
                    if ($funding->status == 'on_sell') {
                        $estimations += $funding->price;
                    }
                    if ($funding->status == 'on_going') {
                        $surplus = $funding->fund_nominal * $funding->campaign->return_percentage/100;
                        $estimations += $funding->fund_nominal + $surplus;
                        $total_fund += $funding->fund_nominal;
                    }
                }
            }
            return view('dashboard.pages.index',[
                'funder_data' => [
                    'total_fund' => $total_fund/1000,
                    'total_obligasi' => $total_obligasi,
                    'estimations' => $estimations/1000,
                    'total_pendapatan' => $totalPendapatan/1000
                ],
                'topCampaign' => $topCampaign
            ]
                );
        }
        if ($user->role === 'partner') {
            # code...
            
            $campaigns = Campaign::all()->where('partner_id', $user->details->id);
            $fund_raised = 0;
            $total_funder = 0;

            foreach ($campaigns as $campaign) {
                foreach ($campaign->fundings as $funding) {
                    $fund_raised += $funding->fund_nominal;
                }
                $total_funder += Funding::all()->where('campaign_id', $campaign->id)->count();
            }


            return view('dashboard.pages.index', [
                'partner_data' => [
                    'campaigns_count' => count($campaigns),
                    'fund_raised' => $fund_raised/1000,
                    'total_funder' => $total_funder
                ]
            ]);
        }
        return view('dashboard.index');
    }
}
