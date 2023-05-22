<?php

namespace App\Http\Controllers\Auth\Registration;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FunderRegistrationController extends Controller
{
    public function index()
    {
        return view('auth.role.register_funder');
    }

    public function store(Request $request)
    {
        $request->validate([
            'ksei_number' => 'required|max:255',
        ]);

        $user =  auth()->user();

        $user->details()->firstOrCreate($request->except(['_token']));

        return redirect()->route('dashboard.index')->with('success', 'Berhasil mendafar');
    }

    public function update(Request $request)
    {
        $request->validate([
            'ksei_number' => 'required|max:255',
        ]);

        $user = auth()->user();

        $user->details()->update($request->except(['_token']));

        return redirect()->route('dashboard.index')->with('success', 'Berhasil mendafar');
    }
}
