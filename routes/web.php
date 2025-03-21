<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});



Route::get('/admin', function () {
    return view('admin.index');
})->name('admin.dashboard');

use App\Http\Controllers\AdminController;

Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
Route::get('/admin/categorie/ajouter', [CategorieController::class, 'ajouter'])->name('admin.articles.ajouter');


