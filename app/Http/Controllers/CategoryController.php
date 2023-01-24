<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $page = $request->get('page');
        $name = $request->get('name');

        //var_dump($request->is('categories'));

        $uri = $request->path();
        $url = $request->url();
        $fullUrl = $request->fullUrl();
        $host = $request->host();

        echo $host;
    }

    public function show($id)
    {
        echo 'Category Controller method: show ID:' . $id;
    }

    public function store()
    {
        echo 'Store method';
    }
}
