<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class BookController extends Controller
{
    public function index(): View
    {
        $books = Book::paginate(10);

        /*$books = Book::cursor()->filter(function ($book) {
            return $book->id > 1010;
        });*/

        //$books = Book::lazy();

        return view('books/index', [
            'books' => $books
        ]);
    }

    public function show($id): View
    {
        $book = Book::find($id);

        if ($book === null) {
            abort(404);
        }

        return view('books/show', [
            'book' => $book
        ]);
    }

    public function create(): View
    {
        $authors = Author::all();

        return view('books/create', [
            'authors' => $authors
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate(
            [
                'name' => 'required|max:50',
            ]
        );

        Book::create($request->all());

        return redirect('books')
            ->with('success', 'Book created successfully!');
    }
}
