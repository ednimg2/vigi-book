<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorController;
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

Route::get('authors', [AuthorController::class, 'index']);
Route::get('authors/create', [AuthorController::class, 'create']);
Route::post('authors/create', [AuthorController::class, 'store']);
Route::post('authors/edit/{id}', [AuthorController::class, 'edit'])->name('authors.edit');
Route::delete('authors/delete/{id}', [AuthorController::class, 'delete'])->name('authors.delete');

Route::get('categories', [CategoryController::class, 'index']);
Route::any('categories/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
Route::get('categories/create', [CategoryController::class, 'create']);
Route::post('categories/create', [CategoryController::class, 'store']);
Route::delete('categories/delete/{id}', [CategoryController::class, 'delete'])->name('category.delete');
Route::get('categories/{id}', [CategoryController::class, 'show']);

Route::get('products/create', [ProductController::class, 'create']);



