<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;

class AuthorController extends Controller
{
    public function index(): View
    {
        $authors = Author::all();

        return view('authors/index', [
            'authors' => $authors
        ]);
    }

    public function show(Author $author): View
    {
        return view('authors/show', compact('author'));
    }

    //atsakinga uz saugojima create formos
    public function store(Request $request): RedirectResponse
    {

        $request->validate(
            [
                'name' => 'required|max:20',
                'surname' => 'required|max:20',
                'country' => 'required|max:20',
                'birthday' => 'required|date',
            ]
        );

        Author::create($request->all());

        //TODO change to authors list
        return redirect('authors')
            ->with('success', 'Author created successfully!');
    }

    //atsakinga uz atvaizdavima create formos
    public function create(): View
    {
        return view('authors/create');
    }

    public function edit(int $id)
    {

    }

    public function delete(int $id)
    {
        /*
         * CRUD
         * C - create
         * R - read
         * U - update
         * D - delete *
         */

        //1. Gaunam pagal id kokia kategorija isvalyt
        $author = Author::find($id);

        //2. Patikrinam ar tokia egzistuoja
        if ($author === null) {
            //3. jeigu neegzistuoja metam 404
            abort(404);
        }

        //4. jeigu egzistuoja isvalom
        $author->delete();

        //5. Po sėkmingo išvalymo redirectinam su sėkmės pranešimu.
        return redirect('authors')->with('success', 'Author was removed!');
    }
}
