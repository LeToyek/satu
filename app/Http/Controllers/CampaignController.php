<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CampaignController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        //
        $campaigns = Campaign::all()->where('partner_id', auth()->user()->details->id);
        foreach ($campaigns as $campaign) {
            $campaign['total_fund'] = 0;
            if (count($campaign->fundings) !== 0) {
                # code...
                foreach ($campaign->fundings as $fund) {
                    # code...
                    $campaign['total_fund'] += $fund->fund_nominal;
                }
            }
        }
        return view('dashboard.pages.campaign.index', [
            'campaigns' => $campaigns
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('dashboard.pages.campaign.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request['partner_id'] = auth()->user()->details->id;
        if ($request->hasFile('image')) {
            $image_name = $request->file('image')->store('images', 'public');
        }
        $campaign = Campaign::create($request->except('_token', 'image'));
        $image = new Image([
            'path' => $image_name,
        ]);
        $image->imageable()->associate($campaign);
        $image->save();

        return \redirect()->route('campaign.index')->with('success', 'Campaign created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Campaign $campaign)
    {
        //
        $campaign['total_fund'] = 0;
        if (count($campaign->fundings) !== 0) {
            # code...

            foreach ($campaign->fundings as $fund) {
                # code...
                $campaign['total_fund'] += $fund->fund_nominal;
            }
            $campaign['total_fund'] = 12000000;
        }
        $campaign['percentage'] = number_format(($campaign['total_fund'] / $campaign->fund_target) * 100,2);
        return view('dashboard.pages.campaign.detail', [
            'campaign' => $campaign
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Campaign $campaign)
    {
        //
        return view('dashboard.pages.campaign.edit', [
            'campaign' => $campaign
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Campaign $campaign)
    {
        //
        // edit image as well
        $campaign->update($request->except('_token', 'image'));
        // remove the image if exist in storage
        if ($request->hasFile('image')) {
            Storage::delete('storage/' . $campaign->images[0]->path);
            $campaign->images[0]->delete();
            $image_name = $request->file('image')->store('images', 'public');
            $image = new Image([
                'path' => $image_name,
            ]);
            $image->imageable()->associate($campaign);
            $image->save();
        }
        return redirect()->route('campaign.index')->with('success', 'Campaign updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Campaign $campaign)
    {
        //
        $campaign->delete();
        return redirect()->route('campaign.index')->with('success', 'Campaign deleted successfully');
    }
}
