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
        $this->middleware('partner');
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
        }
        $campaign['percentage'] = number_format(($campaign['total_fund'] / $campaign->fund_target) * 100, 2);
        return view('dashboard.pages.campaign.detail', [
            'campaign' => $campaign,
            'fundings' => $campaign->fundings

        ]);
    }

    public function disburse(Campaign $campaign)
    {
        $user = auth()->user();

        if ($campaign->partner->user_id !== $user->id) {
            return redirect()->back()->with('error', 'Anda tidak memiliki akses');
        }

        if ($campaign->fund_target !== $campaign->wallet->balance) {
            return redirect()->back()->with('error', 'Campaign belum terdanai');
        }

        $campaign->update([
            'status' => 'on_going',
            'start_date' => now(),
            'finish_date' => now()->addWeek($campaign->tenor),
        ]);

        $campaign->wallet->transfer(auth()->user()->wallet, $campaign->wallet->balance, 'Pencairan dana kampanye ' . $campaign->title);

        return redirect()->route('campaign.index')->with('success', 'Dana berhasil dicairkan');
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

    public function refund(Campaign $campaign)
    {
        $user = auth()->user();

        if ($campaign->partner->user_id !== $user->id) {
            return redirect()->back()->with('error', 'Anda tidak memiliki akses');
        }

        $amount = request()->amount;
        $target = $campaign->return_target;

        if ($campaign->wallet->balance + $amount > $target) {
            return redirect()->back()->with('error', 'Dana yang ditambahkan melebihi target');
        }

        if ($user->wallet->balance < $amount) {
            return redirect()->back()->with('error', 'Saldo tidak cukup');
        }

        $user->wallet->transfer($campaign->wallet, $amount, 'Pengembalian dana kampanye ' . $campaign->title);

        return redirect()->back()->with('success', 'Dana berhasil dikembalikan');
    }

    public function close(Campaign $campaign)
    {
        $user = auth()->user();

        if ($campaign->partner->user_id !== $user->id) {
            return redirect()->back()->with('error', 'Anda tidak memiliki akses');
        }

        if ($campaign->status !== 'on_going') {
            return redirect()->back()->with('error', 'Campaign belum berjalan');
        }

        if ($campaign->wallet->balance != $campaign->return_target) {
            return redirect()->back()->with('error', 'Campaign belum terdanai + bunga');
        }


        // validate funding expected return match with campaign balance
        $total_expected = 0;
        foreach ($campaign->fundings as $funding) {
            $total_expected += $funding->expected_return;
        }

        if ($total_expected != $campaign->wallet->balance) {
            // return $total_expected . " " . $campaign->wallet->balance;
            return redirect()->back()->with('error', 'Campaign belum terdanai + bunga');
        }

        // transfers to all funders
        foreach ($campaign->fundings as $funding) {
            $campaign->wallet->transfer($funding->user->wallet, $funding->expected_return, 'Pengembalian dana kampanye ' . $campaign->title);
        }

        $campaign->update([
            'status' => 'finished',
            'finish_date' => now(),
        ]);

        $campaign->fundings()->update([
            'status' => 'repaid',
        ]);

        return redirect()->back()->with('success', 'Campaign berhasil ditutup');
    }
}
