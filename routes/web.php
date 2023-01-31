<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

/*Route::redirect('/', 'hello', 301);

//user/2
Route::get('user/{id}', function ($id) {
    return 'User: '. $id;
});

//user/2/comments/5
Route::get('user/{id}/comments/{commentId}', function ($id, $commentId) {
    return 'User: '. $id . ' - '. $commentId;
});

// product/Mindaugas
// product
Route::get('product/{name?}', function ($name = 'Apple') {
    return $name;
});

// book/2
// LT23423423
Route::get('book/{id}', function ($id) {
    return $id;
})->where('id', '[A-Za-z]+');
//->where('id', '[0-9]+')
//->where('id', '[LT0-9]+')

Route::get('car/{id}/{name}', function ($id) {
    return $id;
})->whereNumber('id')->whereAlpha('name');*/

// GET index            books/index
// GET show/{id}        books/show/1
// GET create           books/create
// POST store           books/store
// GET edit/{id}        books/edit/1
// PUT update/{id}      books/update/1
// DELETE destroy/{id}  books/destroy/1

Route::get('books', [BookController::class, 'index']);
Route::get('books/{id}', [BookController::class, 'show'])->whereNumber('id');
Route::get('books/create', [BookController::class, 'create']);
Route::post('books/store', [BookController::class, 'store']);

Route::get('categories', [CategoryController::class, 'index']);
Route::any('categories/create', [CategoryController::class, 'create']);
Route::any('categories/edit/{id}', [CategoryController::class, 'edit']);
Route::any('categories/delete/{id}', [CategoryController::class, 'delete']);
Route::get('categories/{id}', [CategoryController::class, 'show']);

Route::get('products/create', [ProductController::class, 'create']);


/*Route::resource('books', BookController::class);

Route::resources([
    'books' => BookController::class,
    'users' => UserController::class,
    'categories' => CategoryController::class
]);*/



