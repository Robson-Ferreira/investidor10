<?php

use App\Http\Controllers\NewspaperController;
use App\Http\Controllers\NewspaperCategoryController;
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

Route::get('/', [NewspaperController::class, 'index'])->name('index');

Route::group(['prefix' => 'newspaper-category', 'as' => 'newspaper-category.'], function () {
    Route::post('/', [NewspaperCategoryController::class, 'store'])->name('store');
});

Route::group(['prefix' => 'newspaper', 'as' => 'newspaper.'], function () {
    Route::get('/', [NewspaperController::class, 'index'])->name('index');
    Route::get('/create', [NewspaperController::class, 'create'])->name('create');
    Route::post('/', [NewspaperController::class, 'store'])->name('store');
});
