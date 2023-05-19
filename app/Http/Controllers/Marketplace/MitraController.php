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
        $campaigns = Campaign::all();
        return view('dashboard.pages.marketplace.mitra.index', ['campaigns' => $campaigns]);
    }
    public function show($id)
    {
        $campaign = Campaign::find($id);
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
        return view('dashboard.pages.marketplace.mitra.checkout',['funding' => $funding]);
    }
}
