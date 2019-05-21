<?php

namespace App\Http\Controllers;
use App\Profile;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index() {
        $profiles = Profile::all();
        // return response()->json($profiles);
        return view('profile')->with('profiles', $profiles);
    }

    public function show($id) {
        $profile = Profile::find($id);
        if(!$profile) return response()->json(['message' => 'Record not found',], 404);
        return response()->json($profile);
    }

    public function store(Request $request) {
        $profile = new Profile();
        $profile->fill($request->all());
        $profile->save();
        return $this->index();
    }

    public function showUpdate() {
        $profiles = Profile::all();
        return view('profile-update')->with('profiles', $profiles);
    }

    public function update(Request $request, $id) {
        $profile = Profile::find($id);
        if(!$profile) return response()->json(['message' => 'Record not found',], 404);
        $profile->fill($request->all());
        $profile->save();
        return $this->index();
    }

    public function showDelete() {
        $profiles = Profile::all();
        return view('profile-delete')->with('profiles', $profiles);
    }

    public function destroy($id) {
        $profile = Profile::find($id);
        if(!$profile) return response()->json(['message' => 'Record not found',], 404);
        $profile->delete();
        return $this->index();
    }
}
