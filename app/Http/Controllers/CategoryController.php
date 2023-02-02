<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\View;

class CategoryController extends Controller
{
    public function index(): View
    {
        // select * from categories
        $categories = Category::all();

        return view('categories/index', [
            'categories' => $categories
        ]);
    }

    public function show(int $id): View
    {
        $category = Category::find($id);
        //Book::where('category_id', $id)->get();
        //$category->books;
        if ($category === null) {
            abort(404);
        }

        return view('categories/show', [
            'category' => $category
        ]);
    }

    //atsakinga uz saugojima create formos
    public function store(StoreCategoryRequest $request) {
        //validacija
        $request->validated();

        Category::create($request->all());

        return redirect('categories')
            ->with('success', 'Category created successfully!');
    }

    //atsakinga uz atvaizdavima create formos
    public function create(): View|RedirectResponse
    {
        return view('categories/create');
    }

    public function edit(int $id, StoreCategoryRequest $request)
    {
        /*
         * CRUD
         * C - create
         * R - read
         * U - update *
         * D - delete
         */

        //1.4. Išvesti kategorijos duomenis template
        //1.5. Pakurti atitinkamą route.
        //1.6. Nuoroda sąraše, kuri nuves į edit formą.

        //1. Reikėtų atvaizduoti viską formoje, t.y. turimą informaciją
        //1.1. Reiktų gauti atitinkamą kategoriją

        $category = Category::find($id); // Select * from categories Where id = {$id} -> new Category()

        //1.2. Pasitikrinti ar ta kategorija egzistuoja
        if ($category === null) {
            abort(404);
        }

        // 2. Updatinam
        // 2.1. tikrinam ar post methodas
        if ($request->isMethod('post')) {

            $request->validate(
                ['name' => 'required|max:12']
            );

            //2.2. užsetinam category propercius
//            $category->name = $request->post('name');
//            $category->author_name = $request->post('author_name');
//            $category->enabled = $request->post('enabled', false);
            //2.3. pasaugom į duomenų bazę.
//            $category->save();
            //2.4. Nukreipiam į index action.
            $category->fill($request->all());
            $category->enabled = $request->post('enabled', false);
            $category->save();

            return redirect('categories')->with('success', 'Category updated!');
        }

        //1.3. Pagrąžinti kategoriją į template
        return view('categories/edit', [
            'category' => $category
        ]);
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
        $category = Category::find($id);

        //2. Patikrinam ar tokia egzistuoja
        if ($category === null) {

            //3. jeigu neegzistuoja metam 404
            abort(404);
        }

        //4. jeigu egzistuoja isvalom
        $category->delete();

        //5. Po sėkmingo išvalymo redirectinam su sėkmės pranešimu.
        return redirect('categories')->with('success', 'Category was removed!');
    }
}
