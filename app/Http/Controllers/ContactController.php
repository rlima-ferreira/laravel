<?php

namespace App\Http\Controllers;
use App\Contact;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index() {
        $contacts = Contact::all();
        // return response()->json($contact);
        return view('contact')->with('contacts', $contacts);
    }

    public function show($id) {
        $contact = Contact::find($id);
        if(!$contact) return response()->json(['message' => 'Record not found',], 404);
        return response()->json($contact);
    }

    public function store(Request $request) {
        $contact = new Contact();
        $contact->fill($request->all());
        $user = Auth::user()->id;
        $contact->user()->associate($user);
        $contact->save();
        return $this->index();
    }

    public function showUpdate() {
        $contacts = Contact::all();
        return view('contact-update')->with('contacts', $contacts);
    }

    public function update(Request $request, $id) {
        $contact = Contact::find($id);
        if(!$contact) return response()->json(['message' => 'Record not found',], 404);
        $contact->fill($request->all());
        $contact->user()->associate($request->user_id);
        $contact->save();
        return $this->index();
    }

    public function showDelete() {
        $contacts = Contact::all();
        return view('contact-delete')->with('contacts', $contacts);
    }

    public function destroy($id) {
        $contact = Contact::find($id);
        if(!$contact) return response()->json(['message' => 'Record not found',], 404);
        $contact->delete();
        return $this->index();
    }
}
