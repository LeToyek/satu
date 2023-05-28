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
        if (auth()->user()->role === 'funder') {
            # code...
            return view('dashboard.pages.index');
        }
        if (auth()->user()->role === 'partner') {
            # code...
            
            $campaigns = Campaign::all()->where('partner_id', auth()->user()->details->id);
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
