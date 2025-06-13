<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PriorityController;
use App\Http\Controllers\CategoryController;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Rutas protegidas por autenticación
Route::middleware(['auth'])->group(function () {
    // CRUD de prioridades
    Route::resource('priorities', PriorityController::class);
    
    // CRUD de categorías
    Route::resource('categories', CategoryController::class);
    
  //Ruta para generar pdf de categorias
Route::get('/categories-pdf', [CategoryController::class, 'pdf'])->name('categories.all.pdf');

  // Ruta apra generar pdf en prioridades
Route::get('/priorities-pdf', [PriorityController::class, 'pdf'])->name('priorities.pdf');


});

