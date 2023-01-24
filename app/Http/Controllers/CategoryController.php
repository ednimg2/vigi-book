<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Response;

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

    public function show($id): Response
    {
        //return view('categories/show');

        if ($id == 1) {
            return response()->view('categories/show');
        }

        return response()->view('categories/error', [], 404);
    }

    public function store(Request $request): View
    {
        if ($request->isMethod('post')) {
            $name = $request->post('full_name');

            return view('categories/store', [
                'name' => $name
            ]);
        }

        return view('categories/store');
    }

    public function json(): JsonResponse
    {
        return response()->json(
            [
                'product_name' => 'TV',
                'price' => 333
            ]
        );
    }
}
