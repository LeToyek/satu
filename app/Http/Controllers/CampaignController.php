<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\Image;
use Illuminate\Http\Request;

class CampaignController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $campaigns = Campaign::all()->where('partner_id', auth()->user()->details->id);
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

        return "asodkaso";
    }

    /**
     * Display the specified resource.
     */
    public function show(Campaign $campaign)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Campaign $campaign)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Campaign $campaign)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Campaign $campaign)
    {
        //
    }
}
