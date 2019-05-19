<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;

class UserController extends Controller
{

    public function show($id) {
        $user = User::find($id);
        if(!$user) return response()->json(['message' => 'Record not found',], 404);
        return response()->json($user);
    }

    public function update(Request $request, $id) {
        $user = User::find($id);
        if(!$user) return response()->json(['message' => 'Record not found',], 404);
        $user->fill($request->all());
        $user->profile()->associate($request->profile_id);
        $user->save();
        return response()->json($user, 201);
    }

    public function destroy($id) {
        $user = User::find($id);
        if(!$user) return response()->json(['message' => 'Record not found',], 404);
        $user->delete();
    }
}
