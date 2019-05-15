<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
// use App\Http\Resources\Book as BookResource;

class BookController extends Controller
{

    public function index() {
        $books = Book::all();
        return response()->json($books);
        // return view('book.index')->with('books', $books);
        // return $this->book->all();
    }

    public function show($id) {
        $book = Book::find($id);
        if(!$book) return response()->json(['message'   => 'Record not found',], 404);
        return response()->json($book);
    }

    public function store(Request $request) {
        $book = new Book();
        $book->fill($request->all());
        $book->save();
        return response()->json($book, 201);
    }

    public function update(Request $request, $id) {
        $book = Book::find($id);
        if(!$book) return response()->json(['message'   => 'Record not found',], 404);
        $book->fill($request->all());
        $book->save();
        return response()->json($book, 201);
    }

    public function destroy($id) {
        $book = Book::find($id);
        if(!$book) return response()->json(['message'   => 'Record not found',], 404);
        $book->delete();
    }
}
