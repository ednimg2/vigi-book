<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        echo 'Category Controller method: index';
    }

    public function show($id)
    {
        echo 'Category Controller method: show';
    }
}
