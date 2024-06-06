<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\adminController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RevisorController;

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
Route::get('/careers', [PublicController::class, 'careers'])->name('careers');
Route::post('careers/submit', [PublicController::class, 'carreersSubmit'])->name('careers.submit');
//*Rotte per la gestione degli articoli/Fumetti
Route::prefix('article')->group(function(){
    Route::get('/create', [ArticleController::class, 'create'])->name('article.create'); // Mostra il modulo di creazione di un nuovo articolo
    Route::post('/store', [ArticleController::class, 'store'])->name('article.store'); // Salva un nuovo articolo
    Route::get('/{article}/edit', [ArticleController::class, 'edit'])->name('article.edit'); // Mostra il modulo di modifica dell'articolo
    Route::put('/{article}/update', [ArticleController::class, 'update'])->name('article.update');// Aggiorna un articolo esistente
    Route::get('/{article}', [ArticleController::class, 'show'])->name('article.show'); // Mostra un articolo specifico
    Route::delete('/{article}/delete', [ArticleController::class, 'destroy'])->name('article.destroy');// Elimina un articolo
    route::get('{article_id}/index', [ArticleController::class, 'index'])->name('article.index'); // Mostra l'elenco degli articoli
    //Mostra la vista fumettisti che hanno inserito articoli
    Route::get('/by-user/{user}', [ArticleController::class, 'byUser'])->name('article.byUser'); // Mostra gli articoli di un utente specifico
});


//!Rotte per la gestione dei profili:
Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index'); // Mostra l'elenco dei profili
Route::get('/profile/{id}/edit', [ProfileController::class, 'edit'])->name('profile.edit'); // Mostra il modulo di modifica del profilo
Route::put('/profile/{id}/update', [ProfileController::class, 'update'])->name('profile.update'); // Aggiorna un profilo esistente
Route::post('/profile', [ProfileController::class, 'store'])->name('profile.store'); // Salva un nuovo profilo
Route::delete('/profile/{id}/delete', [ProfileController::class, 'destroy'])->name('profile.destroy'); // Elimina un profilo
Route::get('/profile/{id}', [ProfileController::class, 'show'])->name('profile.show');                //! Mostra un profilo specifico
Route::get('/profile/utenti', [ProfileController::class, 'fumettisti'])->name('profile.fumettisti'); //? Mostra l'elenco degli utenti
// Route::get('/profile/{$id}/details', [ProfileController::class, 'utente'])->name('profile.utente');
//Metodo di aggiornamento solo immagine
Route::put('/profile/{id}/update-image', [ProfileController::class, 'updateImage'])->name('profile.updateImage');
// Mostra l'elenco dei profilid
//Rotta per la pagina di modifica password:
    Route::get('/profile/{id}/edit-password', [ProfileController::class, 'editPassword'])->name('profile.editPassword'); // Mostra il modulo di modifica della password
    
    Route::put('/profile/{id}/update-password', [ProfileController::class, 'updatePassword'])->name('profile.update-password'); // Aggiorna la password
    Route::get('/profile/{id}/user', [ProfileController::class, 'user'])->name('profile.user'); // Mostra il profilo dell'utente che ha creato quell'articolo 
    
    
    
    
    //CREAZIONE Rotta kitammuort
    
    Route::middleware('admin')->group(function(){
        Route::get('/admin/dashboard', [adminController::class, 'dashboard'])->name('admin.dashboard');
        Route::patch('admin/{user}/set-admin', [AdminController::class, 'setAdmin'])->name('admin.setAdmin');
        Route::patch('admin/{user}/set-revisor', [AdminController::class, 'setRevisor'])->name('admin.setRevisor');
        Route::patch('admin/{user}/set-writer', [AdminController::class, 'setWriter'])->name('admin.setWriter'); // Mostra la dashboard dell'admin
    });
    
    
    Route::middleware('revisor')->group(function(){
        Route::get('/revisor/dashboard', [RevisorController::class, 'dashboard'])->name('revisor.dashboard');
        Route::post('/revisor/{article}/accept', [RevisorController::class, 'accept'])->name('revisor.accept');
        Route::post('/revisor/{article}/reject', [RevisorController::class,'reject'])->name('revisor.reject');
        Route::post('/revisor/{article}/undo', [RevisorController::class, 'undo'])->name('revisor.undo');
    });
    
    