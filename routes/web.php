<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers;
use App\Http\Controllers\IngredientController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/ingredients', [IngredientController::class, 'index'])->name('ingredients.index');
Route::get('/ingredients/create', [IngredientController::class, 'create'])->name('ingredients.create');
Route::post('/ingredients/store', [IngredientController::class, 'store'])->name('ingredients.store');
Route::get('/ingredients/edit/{id}',[IngredientController::class, 'edit'])->name('ingredients.edit');
Route::post('/ingredients/update/{id}', [IngredientController::class, 'update'])->name('ingredients.update');

require __DIR__.'/auth.php';
