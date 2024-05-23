<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\UserController;

Route::get('/', [PostController::class, 'index'])->name('posts.index');

Route::get('posts/{post:slug}', [PostController::class, 'show']);




// Rutas de autenticación
Route::middleware(['auth'])->group(function () {
    // Rutas de usuario autenticado
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Otras rutas que requieren autenticación
});

Route::get('posts/{post:slug}/comments', [CommentController::class, 'store']);




//Perfil

Route::get('perfil/{name}', [UserController::class, 'show'])->name('perfil.show');

Route::get('perfil/{name}/edit', [UserController::class, 'edit'])->name('perfil.edit');
Route::put('perfil/{name}', [UserController::class, 'update'])->name('perfil.update');



//Admin

Route::get('admin/posts/create', [AdminPostController::class, 'create'])->middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
]);
Route::post('admin/posts', [AdminPostController::class, 'store'])->middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
]);

Route::get('admin/posts', [AdminPostController::class, 'index'])->middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
]);
Route::get('admin/posts/{post}/edit', [AdminPostController::class, 'edit'])->middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
]);
Route::patch('admin/posts/{post}', [AdminPostController::class, 'update'])->middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
]);
Route::delete('admin/posts/{post}', [AdminPostController::class, 'destroy'])->middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
]);
