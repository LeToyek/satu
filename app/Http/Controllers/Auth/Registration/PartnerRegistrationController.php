<?php

namespace App\Http\Controllers\Auth\Registration;

use App\Http\Controllers\Controller;
use App\Models\Partner;
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
        //
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'address' => 'required',
            'monthly_income' => 'required|numeric',
            'sector' => 'required|max:255',
            'found_at' => 'required|date',
        ]);
        $validatedData['user_id'] = auth()->user()->id;
        
        $partner = Partner::create($validatedData);
        
        // $file = $request->file('pdf_file');
        // $path = $file->store('pdfs');
        // $request->validate([
        //     'pdf_file' => 'required|mimes:pdf|max:2048',
        // ]);
        // $partner->documents()->create([
        //     'name' => $file->getClientOriginalName(),
        //     'file_path' => $path,
        //     'documentable_type' => 'App\Post',
        // ]);
        
        return redirect()->route('dashboard.index')->with('success', 'New event has been added');
    }
}
