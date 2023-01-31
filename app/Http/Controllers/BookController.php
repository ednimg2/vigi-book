<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class BookController extends Controller
{
    public function index(Request $request): View
    {
        $books = Book::all();

        /*$books = Book::cursor()->filter(function ($book) {
            return $book->id > 1010;
        });*/

        //$books = Book::lazy();

        return view('books/index', [
            'books' => $books
        ]);
    }

    public function show($id)
    {
        $book = Book::find($id);

        if ($book === null) {
            abort(404);
        }

        dd($book->name);

        echo 'Show'. $id;
    }
}
