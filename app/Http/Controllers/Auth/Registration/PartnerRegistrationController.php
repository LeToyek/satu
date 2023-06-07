<?php

namespace App\Http\Controllers\Auth\Registration;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PartnerRegistrationController extends Controller
{
    //
    public function index()
    {
        return view('auth.role.register_partner');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'address' => 'required',
            'monthly_income' => 'required|numeric',
            'sector' => 'required|max:255',
            'found_at' => 'required|date',
            'image' => 'required|image',
            'bussines_permit' => 'required|mimes:pdf',
            'npwp' => 'required|mimes:pdf',
        ]);

        $user =  auth()->user();

        $partner = $user->details()->firstOrCreate($request->except(['_token', 'image', 'bussines_permit', 'npwp']));

        // upload files
        $image = $request->file('image');
        $bussines_permit = $request->file('bussines_permit');
        $npwp = $request->file('npwp');

        $image_path = $image->store('partner/images', 'public');
        $bussines_permit_path = $bussines_permit->store('partner/bussines_permit', 'public');
        $npwp_path = $npwp->store('partner/npwp', 'public');

        $user->details->image()->firstOrCreate([
            'path' => $image_path,
        ]);

        $user->details->documents()->create([
            'title' => 'Izin Usaha',
            'path' => $bussines_permit_path,
        ]);

        $user->details->documents()->create([
            'title' => 'NPWP',
            'path' => $npwp_path,
        ]);

        return redirect()->route('dashboard.index')->with('success', 'Berhasil mendafar');
    }

    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'address' => 'required',
            'monthly_income' => 'required|numeric',
            'sector' => 'required|max:255',
            'found_at' => 'required|date',
        ]);
        $validatedData['user_id'] = auth()->user()->id;
        $partner = Partner::find($request->id);
        $partner->update($validatedData);
        return redirect()->route('dashboard.index')->with('success', 'New event has been added');
    }
}
