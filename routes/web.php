<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RevisorController;
use App\Http\Controllers\AdminController;

Route::get('/', [PublicController::class, 'home'])->name('home');
Route::get('/careers', [PublicController::class, 'careers'])->name('careers');
Route::post('careers/submit', [PublicController::class, 'carreersSubmit'])->name('careers.submit');

Route::prefix('article')->group(function(){
    Route::get('/create', [ArticleController::class, 'create'])->name('article.create');
    Route::post('/store', [ArticleController::class,'store'])->name('article.store');
    Route::get('/{article}/edit', [ArticleController::class, 'edit'])->name('article.edit');
    Route::put('/{article}/update', [ArticleController::class, 'update'])->name('article.update');
    Route::get('/{article}', [ArticleController::class, 'show'])->name('article.show');
    Route::delete('/{article}/delete', [ArticleController::class, 'destroy'])->name('article.destroy');
    Route::get('{article}/index', [ArticleController::class, 'index'])->name('article.index');
    Route::get('/by-user/{user}', [ArticleController::class, 'byUser'])->name('article.byUser');
    
});

Route::prefix('article')->middleware('writer')->group(function(){
    Route::get('/create', [ArticleController::class, 'create'])->name('article.create');
    Route::post('/store', [ArticleController::class,'store'])->name('article.store');
});

Route::get('/profile/index', [ProfileController::class, 'index'])->name('profile.index');
Route::get('/profile/{id}/edit', [ProfileController::class, 'edit'])->name('profile.edit');
Route::put('/profile/{id}/update', [ProfileController::class, 'update'])->name('profile.update');
Route::post('/profile/store', [ProfileController::class, 'store'])->name('profile.store');
Route::delete('/profile/{id}/delete', [ProfileController::class, 'destroy'])->name('profile.destroy');
Route::get('/profile/{id}', [ProfileController::class, 'show'])->name('profile.show');
Route::get('/profile/utenti', [ProfileController::class, 'fumettisti'])->name('profile.fumettisti');
Route::put('/profile/{id}/update-image', [ProfileController::class, 'updateImage'])->name('profile.updateImage');
Route::get('/profile/{id}/edit-password', [ProfileController::class, 'editPassword'])->name('profile.editPassword');
Route::put('/profile/{id}/update-password', [ProfileController::class, 'updatePassword'])->name('profile.update-password');
Route::get('/profile/{id}/user', [ProfileController::class, 'user'])->name('profile.user');

Route::middleware('admin')->group(function(){
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::patch('/admin/{user}/set-admin', [AdminController::class, 'setAdmin'])->name('admin.setAdmin');
    Route::patch('/admin/{user}/set-revisor', [AdminController::class, 'setRevisor'])->name('admin.setRevisor');
    Route::patch('/admin/{user}/set-writer', [AdminController::class, 'setWriter'])->name('admin.setWriter');
});

Route::middleware('revisor')->group(function(){
    Route::get('/revisor/dashboard', [RevisorController::class, 'dashboard'])->name('revisor.dashboard');
    Route::post('/revisor/{article}/accept', [RevisorController::class, 'accept'])->name('revisor.accept');
    Route::post('/revisor/{article}/reject', [RevisorController::class,'reject'])->name('revisor.reject');
    Route::post('/revisor/{article}/undo', [RevisorController::class, 'undo'])->name('revisor.undo');
});
