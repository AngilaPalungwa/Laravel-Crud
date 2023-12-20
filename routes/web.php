<?php

use App\Http\Controllers\ProductController;
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
    return view('productForm');
});
Route::get('/productForm',[ProductController::class,'form'])->name('product.form');
Route::post('/productSubmit',[ProductController::class,'handleProduct'])->name('product.submit');
Route::put('/productUpdate/{id}',[ProductController::class,'updateProduct'])->name('product.update');
Route::get('/productEdit/{id}',[ProductController::class,'editProduct'])->name('product.edit');
Route::get('/productIndex',[ProductController::class,'index'])->name('product.index');
Route::delete('/productDelete/{$id}',[ProductController::class,'deleteProduct'])->name('product.delete');
