<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Response;

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

        if ($category === null) {
            abort(404);
        }

        return view('categories/show', [
            'category' => $category
        ]);
    }

    public function create(Request $request): View|RedirectResponse
    {
        if ($request->isMethod('post')) {
            /*$category = new Category();
            $category->name = $request->post('category_name');
            if ($request->post('enabled')) {
                $category->enabled = $request->post('enabled');
            }
            $category->save();*/

            Category::create($request->all());

            return redirect('categories')
                ->with('success', 'Category created successfully!');
        }

        return view('categories/create');
    }

    public function edit()
    {

    }

    public function delete()
    {

    }
}
