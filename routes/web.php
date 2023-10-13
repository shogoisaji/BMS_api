<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisteredUserController;

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

// Route::view('/', 'login');
// Route::post('/', [\App\Http\Controllers\AuthController::class, 'login'])->name('login');

// Route::get('/auth.register', [RegisteredUserController::class, 'create'])
//     ->middleware('guest')
//     ->name('register');

// // login User only
// Route::middleware('auth')->group(function () {
//     // ProfileController
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

//     // UserController
//     Route::get('/account', [\App\Http\Controllers\UserController::class, 'account'])->name('account');

//     // StockBookController
//     Route::get('/book.list',  [\App\Http\Controllers\StockBookController::class, 'list'])->name('book.list');
//     Route::get('/book/{id}', [\App\Http\Controllers\StockBookController::class, 'detail'])->name('detail');
//     Route::get('/books.searchForm', [\App\Http\Controllers\SearchController::class, 'searchForm'])->name('searchForm');
//     Route::post('/books.searchForm', [\App\Http\Controllers\SearchController::class, 'searchResult'])->name('searchResult');
//     Route::post('/register-book', [\App\Http\Controllers\StockBookController::class, 'store'])->name('registrationBook');
//     Route::post('/books/{id}/return', [\App\Http\Controllers\StockBookController::class, 'return'])->name('return');

//     // CommentController
//     Route::post('/comment', [\App\Http\Controllers\CommentController::class, 'store'])->name('comment.store');

//     // RentalBookController
//     Route::get('/rentals', [\App\Http\Controllers\RentalBookController::class, 'list'])->name('rentals');
//     Route::post('/books/{id}/rental', [\App\Http\Controllers\RentalBookController::class, 'rental'])->name('rental');
// });