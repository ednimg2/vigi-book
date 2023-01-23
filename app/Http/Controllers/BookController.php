<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;

class BookController extends Controller
{
    public function index(Request $request): View
    {
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
        ]);
    }

    public function show($id)
    {
        echo 'Show'. $id;
    }
}
