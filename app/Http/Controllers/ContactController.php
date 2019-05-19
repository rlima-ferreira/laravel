<?php

namespace App\Http\Controllers;
use App\Contact;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index() {
        $contact = Contact::all();
        return response()->json($contact);
    }

    public function show($id) {
        $contact = Contact::find($id);
        if(!$contact) return response()->json(['message' => 'Record not found',], 404);
        return response()->json($contact);
    }

    public function store(Request $request) {
        $contact = new Contact();
        $contact->fill($request->all());
        $contact->user()->associate($request->user_id);
        $contact->save();
        return response()->json($contact, 201);
    }

    public function update(Request $request, $id) {
        $contact = Contact::find($id);
        if(!$contact) return response()->json(['message' => 'Record not found',], 404);
        $contact->fill($request->all());
        $contact->user()->associate($request->user_id);
        $contact->save();
        return response()->json($contact, 201);
    }

    public function destroy($id) {
        $contact = Contact::find($id);
        if(!$contact) return response()->json(['message' => 'Record not found',], 404);
        $contact->delete();
    }
}
