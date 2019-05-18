<?php

namespace App\Http\Controllers;
use App\Contact;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index() {
        $book = Contact::all();
        return response()->json($book);
    }

    public function show($id) {
        $book = Contact::find($id);
        if(!$book) return response()->json(['message' => 'Record not found',], 404);
        return response()->json($book);
    }

    public function store(Request $request) {
        $book = new Contact();
        $book->fill($request->all());
        $book->save();
        return response()->json($book, 201);
    }

    public function update(Request $request, $id) {
        $book = Contact::find($id);
        if(!$book) return response()->json(['message' => 'Record not found',], 404);
        $book->fill($request->all());
        $book->save();
        return response()->json($book, 201);
    }

    public function destroy($id) {
        $book = Contact::find($id);
        if(!$book) return response()->json(['message' => 'Record not found',], 404);
        $book->delete();
    }
}
