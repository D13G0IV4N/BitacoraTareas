<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PriorityController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AssetsController;


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


//Rutas para lo de guardar imagenes y videos 
Route::resource('assets', AssetsController::class)
     ->only(['index','create','store']);

Route::get('assets/images/{file}', [AssetsController::class, 'getImage'])
     ->name('assets.image');

Route::get('assets/videos/{file}', [AssetsController::class, 'getVideo'])
     ->name('assets.video');



    
//Ruta para generar pdf de categorias
Route::get('/categories-pdf', [CategoryController::class, 'pdf'])->name('categories.all.pdf');

// Ruta apra generar pdf en prioridades
Route::get('/priorities-pdf', [PriorityController::class, 'pdf'])->name('priorities.pdf');




});

