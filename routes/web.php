<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PageController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[PageController::class, 'index'])->name('index');
Route::get('/product/{product}',[PageController::class,'show'])->name('product.show');
Route::get('/category/{id}',[PageController::class,'category_index'])->name('category_index');

Route::get('/post',[PageController::class,'post_index'])->name('post_index');

