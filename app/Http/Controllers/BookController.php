<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
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
        $categories = Category::all();

        return view('books/create', [
            'authors' => $authors,
            'categories' => $categories
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate(
            [
                'name' => 'required|min:3|max:50',
                'author_id' => 'required',
                'category_id' => 'required'
            ]
        );

        Book::create($request->all());

        return redirect('books')
            ->with('success', 'Book created successfully!');
    }

    public function edit(Request $request, int $id): View|RedirectResponse
    {
        $book = Book::find($id);

        $authors = Author::all();
        $categories = Category::all();

        if ($book === null) {
            abort(404);
        }

        if ($request->isMethod('post')) {
            $request->validate(
                [
                    'name' => 'required|min:3|max:50',
                    'author_id' => 'required',
                    'category_id' => 'required'
                ]
            );

            $book->fill($request->all());
            $book->save();

            return redirect('books')->with('success', 'Book updated!');
        }

        return view('books/edit', [
            'book' => $book,
            'authors' => $authors,
            'categories' => $categories
        ]);

        //return view('books/edit', compact('book', 'authors', 'categories'));
    }
}
