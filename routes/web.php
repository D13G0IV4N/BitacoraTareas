<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PriorityController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\UserController;



//Ruta de inicio y de Landing page
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

// CRUD de Actividades
Route::resource('activities', App\Http\Controllers\ActivityController::class)->middleware(['auth']);

// CRUD de Comentarios
Route::resource('comments', CommentController::class);

// CRUD de Usuarios
Route::resource('users', UserController::class);
    
//Ruta para generar pdf de categorias
Route::get('/categories-pdf', [CategoryController::class, 'pdf'])->name('categories.all.pdf');

// Ruta apra generar pdf en prioridades
Route::get('/priorities-pdf', [PriorityController::class, 'pdf'])->name('priorities.pdf');




});

