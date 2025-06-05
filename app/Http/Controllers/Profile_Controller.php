<?php

namespace App\Http\Controllers;

use App\Models\Profile_Models as Profile;

use Illuminate\Http\Request;

class Profile_Controller extends Controller
{
    public function index()
    {
        $profiles = Profile::all();
        return view('admin.profile.index', compact('profiles'));
    }

    public function create()
    {
        return view('admin.profile.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:profiles,email',
        ]);

        Profile::create($request->all());
        return redirect()->route('profile.index')->with('success', 'Profile created successfully.');
    }

    public function show(Profile $profile)
    {
        return view('admin.profile.show', compact('profile'));
    }

    public function edit(Profile $profile)
    {
        return view('admin.profile.edit', compact('profile'));
    }

    public function update(Request $request, Profile $profile)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:profiles,email,' . $profile->id,
        ]);

        $profile->update($request->all());
        return redirect()->route('profile.index')->with('success', 'Profile updated successfully.');
    }

    public function destroy(Profile $profile)
    {
        $profile->delete();
        return redirect()->route('profile.index')->with('success', 'Profile deleted successfully.');
    }
}
