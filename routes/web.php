<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ProfileController;

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
//*Rotta per la pagina principale
Route::get ('/', [PublicController::class, 'home'])->name('home');
//*Rotte per la gestione degli articoli/Fumetti
Route::prefix('article')->group(function(){
    Route::get('/create', [ArticleController::class, 'create'])->name('article.create'); // Mostra il modulo di creazione di un nuovo articolo
    Route::post('/store', [ArticleController::class, 'store'])->name('article.store'); // Salva un nuovo articolo
    Route::get('/{article}/edit', [ArticleController::class, 'edit'])->name('article.edit'); // Mostra il modulo di modifica dell'articolo
    Route::put('/{article}/update', [ArticleController::class, 'update'])->name('article.update');// Aggiorna un articolo esistente
    Route::get('/{article}', [ArticleController::class, 'show'])->name('article.show'); // Mostra un articolo specifico
    Route::delete('/{article}/delete', [ArticleController::class, 'destroy'])->name('article.destroy');// Elimina un articolo
    route::get('/{id}/index', [ArticleController::class, 'index'])->name('article.index'); // Mostra l'elenco degli articoli
});


//!Rotte per la gestione dei profili:
Route::get('/create-profile', [ProfileController::class, 'create'])->name('profile.create'); // Crea un nuovo profilo
Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index'); // Mostra l'elenco dei profili
Route::get('/profile/{id}', [ProfileController::class, 'show'])->name('profile.show'); // Mostra un profilo specifico
Route::get('/profile/{id}/edit', [ProfileController::class, 'edit'])->name('profile.edit'); // Mostra il modulo di modifica del profilo
Route::put('/profile/{id}/update', [ProfileController::class, 'update'])->name('profile.update'); // Aggiorna un profilo esistente
Route::post('/profile', [ProfileController::class, 'store'])->name('profile.store'); // Salva un nuovo profilo
Route::get('/profile/{id}/delete', [ProfileController::class, 'destroy'])->name('profile.destroy'); // Elimina un profilo
