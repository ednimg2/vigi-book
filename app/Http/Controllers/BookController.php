<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class BookController extends Controller
{
    public function index(): View
    {
        //$books = Book::with('category', 'authors')->paginate(10);
        $books = Book::paginate(10);

        return view('books/index', [
            'books' => $books
        ]);
    }

    public function indexWithoutAuthors(): View
    {
        $books = Book::without('authors')->get();

        return view('books/index_without_author', [
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
        $categories = Category::where('enabled', '=', 1)
            ->whereNull('category_id')
            ->with('childrenCategories')->get();

        return view('books/create', [
            'authors' => $authors,
            'categories' => $categories
        ]);
    }

    public function store(Request $request): RedirectResponse|View
    {
        $request->validate(
            [
                'name' => 'required|min:3|max:50',
                'author_id' => 'required',
                'category_id' => 'required'
            ]
        );

        $book = Book::create($request->all());
        $authors = Author::find($request->post('author_id'));
        $book->authors()->attach($authors);
        //$book->authors()->attach($request->post('author_id')); // alternativa, jeigu su tais autoriais nieko nereikia daugiau daryti

        return redirect('books')
            ->with('success', 'Book created successfully!');
    }

    public function edit(Request $request, int $id): View|RedirectResponse
    {
        $book = Book::find($id);

        $authors = Author::all();
        $categories = Category::where('enabled', '=', 1)
            ->whereNull('category_id')
            ->with('childrenCategories')->get();

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

            $book->update($request->all());

            $book->authors()->detach();
            $authors = Author::find($request->post('author_id'));
            $book->authors()->attach($authors);

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
