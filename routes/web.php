<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ArticleController::class, 'index']);
Route::get('/category', function () { 
    $categories = \App\Models\Category::all();
    return view('categories-list', compact('categories')); 
});
Route::get('/category/{id}', [ArticleController::class, 'showByCategory']);

Route::middleware('guest')->group(function () {
    Route::get('/register', function () { return view('auth.register'); })->name('register');
    Route::post('/register', [AuthController::class, 'register']);
    Route::get('/login', function () { return view('auth.login'); })->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    
    Route::middleware('role:journalist,admin')->group(function () {
        Route::get('/journalist', [ArticleController::class, 'create']);
        Route::post('/journalist', [ArticleController::class, 'store'])->name('articles.store');
        Route::delete('/articles/{id}', [ArticleController::class, 'destroy'])->name('articles.destroy');
    });

    Route::middleware('role:admin')->group(function () {
        Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
        Route::post('/admin/user/{user}/role', [AdminController::class, 'updateRole'])->name('admin.updateRole');
    });
});