<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PublishController;
use App\Http\Controllers\FavoriteController;

Route::get('/', function () {
    return view('main');
});

Auth::routes();

Route::group(['middleware' => ['permission:book-read']], function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home.index');
});

Route::group(['middleware' => ['role:admin']], function () {
    Route::group(['prefix' => 'categories'], function () {
        Route::get('/', [CategoryController::class, 'index'])->name('categories.index');
        Route::post('/', [CategoryController::class, 'store'])->name('categories.store');
        Route::get('/create', [CategoryController::class, 'create'])->name('categories.create');
        Route::get('/{category}', [CategoryController::class, 'show'])->name('categories.show');
        Route::match(['put', 'patch'], '/{category}', [CategoryController::class, 'update'])->name('categories.update');
        Route::delete('/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');
        Route::get('/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
    });

    Route::group(['prefix' => 'publish'], function () {
        Route::get('/', [PublishController::class, 'index'])->name('publish.index');
        Route::post('/', [PublishController::class, 'store'])->name('publish.store');
        Route::get('/create', [PublishController::class, 'create'])->name('publish.create');
        Route::get('/{publish}', [PublishController::class, 'show'])->name('publish.show');
        Route::match(['put', 'patch'], '/{publish}', [PublishController::class, 'update'])->name('publish.update');
        Route::delete('/{publish}', [PublishController::class, 'destroy'])->name('publish.destroy');
        Route::get('/{publish}/edit', [PublishController::class, 'edit'])->name('publish.edit');
    });
});

Route::group(['middleware' => ['permission:book-read|']], function () {
    Route::group(['prefix' => 'books'], function () {
        Route::get('/', [BookController::class, 'index'])->name('books.index');
        Route::post('/', [BookController::class, 'store'])->name('books.store');
        Route::group(['middleware' => ['permission:book-create|']], function () {
            Route::get('/create', [BookController::class, 'create'])->name('books.create');
            Route::match(['put', 'patch'], '/{book}', [BookController::class, 'update'])->name('books.update');
            Route::get('/{book}/edit', [BookController::class, 'edit'])->name('books.edit');
        });
        Route::get('/{book}', [BookController::class, 'show'])->name('books.show');
        Route::delete('/{book}', [BookController::class, 'destroy'])->name('books.destroy');
        Route::get('/{book}/read', [BookController::class, 'read'])->name('books.read');
    });
});
