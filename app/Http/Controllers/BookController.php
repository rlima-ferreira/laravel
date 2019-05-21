<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Book;
use App\User;
// use App\Http\Resources\Book as BookResource;

class BookController extends Controller
{

    public function index() {
        $books = Book::all();
        // return response()->json($books);
        return view('book')->with('books', $books);
    }

    public function show($id) {
        $book = Book::find($id);
        if(!$book) return response()->json(['message' => 'Record not found',], 404);
        return response()->json($book);
    }

    public function store(Request $request) {
        $book = new Book();
        $book->fill($request->all());
        $book->save();
        return $this->index();
        // return response()->json($book, 201);
    }

    public function showUpdate() {
        $books = Book::all();
        return view('book-update')->with('books', $books);
    }

    public function update(Request $request, $id) {
        $book = Book::find($id);
        if(!$book) return response()->json(['message' => 'Record not found',], 404);
        $book->fill($request->all());
        $book->save();
        return $this->index();
    }

    public function showDelete() {
        $books = Book::all();
        return view('book-delete')->with('books', $books);
    }

    public function destroy($id) {
        $book = Book::find($id);
        if(!$book) return response()->json(['message' => 'Record not found',], 404);
        $book->delete();
        return $this->index();
    }

    public function markRead(Request $request) {
        $book = Book::find($request->id);
        $book->read()->attach(Auth::user()->id);
        return $this->listRead();
    }

    public function markWanted(Request $request) {
        $book = Book::find($request->id);
        $book->wanted()->attach(Auth::user()->id);
        return $this->listWanted();
    }

    public function listRead() {
        $books = Book::all();
        $reads = User::find(Auth::user()->id)->read()->get();
        return view('book-read')->with('books', $books)->with('reads', $reads);
    }

    public function listWanted() {
        $books = Book::all();
        $wanteds = User::find(Auth::user()->id)->wanted()->get();
        return view('book-wanted')->with('books', $books)->with('wanteds', $wanteds);
    }
}
