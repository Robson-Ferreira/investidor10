<?php

use App\Http\Controllers\NewspaperController;
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

// Route::get('/', function () {
//     return view('index');
// });

Route::get('/', [NewspaperController::class, 'index'])->name('index');



// Route::get('/produtos', [NewspaperController::class, 'index'])->name('produtos.index');

Route::group(['prefix' => 'newspaper', 'as' => 'newspaper.'], function () {
    Route::get('/', [NewspaperController::class, 'index'])->name('index');
    Route::get('/create', [NewspaperController::class, 'create'])->name('create');
    Route::post('/', [NewspaperController::class, 'store'])->name('store');
    // Route::get('/{id}', [ProdutoController::class, 'show'])->name('show');
    // Route::get('/{id}/edit', [ProdutoController::class, 'edit'])->name('edit');
    // Route::put('/{id}', [ProdutoController::class, 'update'])->name('update');
    // Route::delete('/{id}', [ProdutoController::class, 'destroy'])->name('destroy');
});
