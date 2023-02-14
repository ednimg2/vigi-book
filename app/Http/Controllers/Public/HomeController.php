<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Contracts\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $books = Book::all();

        /*return view('public/home', [
            'books' => $books
        ]);*/

        return view('public/home', compact('books'));
    }
}
