<?php

use App\Http\Controllers\ComicController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', HomeController::class)->name('#');

// MEMO: Le route delle liste hanno il nome al PLURALE, le route dei singoli prodotti ce l'hanno al SINGOLARE!!!!
Route::get('/comics', [ComicController::class, 'index'])->name('comics.index');

Route::get('/comics/{index}', function ($index) {
    $comics = config('comics');
    $comic = $comics[$index];
    return view('comics.show', compact('comic'));
})->name('comics.show');
