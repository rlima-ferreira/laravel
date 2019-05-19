<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\User;
// use App\Http\Resources\Book as BookResource;

class BookController extends Controller
{

    public function index() {
        $books = Book::all();
        return response()->json($books);
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
        return response()->json($book, 201);
    }

    public function update(Request $request, $id) {
        $book = Book::find($id);
        if(!$book) return response()->json(['message' => 'Record not found',], 404);
        $book->fill($request->all());
        $book->save();
        return response()->json($book, 201);
    }

    public function destroy($id) {
        $book = Book::find($id);
        if(!$book) return response()->json(['message' => 'Record not found',], 404);
        $book->delete();
    }

    public function markRead(Request $request) {
        $book = Book::find($request->book_id);
        $book->read()->attach($request->user_id);
        return 'Livro marcado como lido!';
    }

    public function markWanted(Request $request) {
        $book = Book::find($request->book_id);
        $book->wanted()->attach($request->user_id);
        return 'Livro marcado como desejado!';
    }

    public function listRead($id) {
        return User::find($id)->read()->get();
    }

    public function listWanted($id) {
        return User::find($id)->wanted()->get();
    }
}
