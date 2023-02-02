<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;

class AuthorController extends Controller
{
    //atsakinga uz saugojima create formos
    public function store(Request $request) {

        $request->validate(
            [
                'first_name' => 'required|max:20',
                'last_name' => 'required|max:20',
                'country' => 'required|max:20',
                'birthday' => 'required|date',
            ]
        );

        Author::create($request->all());

        //TODO change to authors list
        return redirect('categories')
            ->with('success', 'Author created successfully!');
    }

    //atsakinga uz atvaizdavima create formos
    public function create(): View
    {
        return view('authors/create');
    }
}
