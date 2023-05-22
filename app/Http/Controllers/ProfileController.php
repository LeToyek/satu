<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct(){

        $this->middleware('auth');
    }
    public function index()
    {
        //

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $isUser = false;
        $user = User::find($id);
        if ($id == auth()->user()->id) {
            # code...
            $isUser = true;
        }
        return view('dashboard.pages.profile.show', ['user' => $user, 'isUser' => $isUser]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = User::find($id);
        if ($user && $id != auth()->user()->id) {
            return redirect()->route('dashboard.index')->with('error', 'Unauthorized to access that edit page');
        }
        return view('dashboard.pages.profile.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        if ($id != auth()->user()->id) {
            return redirect()->route('dashboard.index')->with('error', 'Unauthorized to access that edit page');
        }
        $user = User::find($id);
        if ($request->hasFile('avatar')) {
            if ($user->images!=null) {
                Storage::delete('storage/' . $user->images[0]->path);
                $user->images[0]->delete();
            }
            $image_name = $request->file('avatar')->store('avatar', 'public');
            $user->avatar->update([
                'path' => $image_name,
            ]);
        }
        $user->update($request->except('_token', '_method'));
        return redirect()->route('profile.show',['profile' => $user])->with('success', 'Profile updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
