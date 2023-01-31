<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function create()
    {
        $product = new Product();
        $product->name = 'apple';
        $product->price = 34.54;
        $product->created_at = '2022-12-12 00:00:00';
        $product->save();

        dd($product);
    }
}
