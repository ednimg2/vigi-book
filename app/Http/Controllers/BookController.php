<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;

class BookController extends Controller
{
    public function index(Request $request): View
    {
        $books = Book::all();

        foreach ($books as $book) {
            var_dump($book->id);
            var_dump($book->name);
        }
        //$page = $_GET['page'];
        $page = $request->get('page');
        $name = 'Mindaugas';
        $array = [
            [
                'product_name' => 'TV',
                'price' => 300,
            ],
            [
                'product_name' => 'Phone',
                'price' => 500,
            ],
        ];

        return view('books/index', [
            'page' => $page,
            'name' => $name,
            'products' => $array,
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
