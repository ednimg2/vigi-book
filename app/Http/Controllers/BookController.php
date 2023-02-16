<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\File;

class BookController extends Controller
{
    public function index(Request $request): View
    {
        #1. gauti filtrus is requesto
        #2. Pasitikrinti ar tam tikras key yra requeste
        #3. Jeigu yra tuomet turim prideti where filtriuka

        #1 -> abu
        #2 tik categorija
        #3 tik pavadinimas
        $books = Book::query(); //query builser

        if ($request->query('category_id')) {
            $books->where('category_id', '=', $request->query('category_id'));
        }

        if ($request->query('name')) {
            $books->where('name', 'like', '%' . $request->query('name') . '%');
        }


        $categories = Category::where('enabled', '=', 1)
            ->whereNull('category_id')
            ->with('childrenCategories')->get();

        return view('books/index', [
            'books' => $books->paginate(10),
            'categories' => $categories,
            'category_id' => $request->query('category_id'),
            'name' => $request->query('name'),
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
        #1. Reikia papildyti forma mygtuku <input type=file +
        #2. Pakeisti formos tipą +
        #3. Pasiziurėt requestą +
        #4. Patalpinti failą +
        #5. Prie knygos prisidėti lauką skirtą failo path: migraciją +
        #6. Galėsim pasaugoti book image value prie duomenų bazės +
        #7. Pabandysim nuotrauką atvaizduoti template, tam reikės naudoti symlink ir reikės assetus.

        $request->validate(
            [
                'name' => 'required|min:3|max:50',
                'author_id' => 'required',
                'category_id' => 'required',
                'image' => [
                    'required',
                    File::types(['jpg', 'wav'])
                        ->min(1024)
                        ->max(12 * 1024),
                ],
            ]
        );

        $book = Book::create($request->all());

        $file = $request->file('image'); //Objektas
        $path = $file->store('book_images'); //Saugom į katalogą. -> book_images
        Storage::disk('public')->put('katalogas', $file); // public kataloge saugom
        $book->image = $path; //priskirimas
        $book->save();

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
