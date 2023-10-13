<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\RentalBookController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\StockBookController;
use App\Http\Controllers\UserController;

// auth
Route::post('/login', \App\Http\Controllers\Auth\LoginController::class);
Route::post('/register', \App\Http\Controllers\Auth\RegisterController::class);

Route::middleware('auth:api')->group(function () {
    // stock book
    Route::get('/books', [StockBookController::class, 'list']);
    Route::get('/books/{id}', [StockBookController::class, 'detail']);
    Route::post('/books', [StockBookController::class, 'store']);
    Route::post('/books/return/{id}', [StockBookController::class, 'return']);

    // rental
    Route::post('/rental/{id}', [RentalBookController::class, 'rental']);
    Route::get('/rental', [RentalBookController::class, 'list']);

    // search
    Route::get('/search', [SearchController::class, 'searchResult']);
    Route::get('/search/form', [SearchController::class, 'searchForm']);

    // comment
    Route::post('/comment', [CommentController::class, 'store']);

    // user
    Route::get('/account', [UserController::class, 'account']);
});