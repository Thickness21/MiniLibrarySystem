<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route group that requires authentication
Route::group([], function(){

    // Route group for Admin Pages
    Route::group([], function(){

        // Dashboard
        Route::get('/', [App\Http\Controllers\HomeController::class, 'admin'])->name("admin.dashboard");

    });

    Route::resource('/books', App\Http\Controllers\BookController::class);
    Route::resource('/users', App\Http\Controllers\UserController::class);

    Route::get('/transactions/waiting_for_approval',[App\Http\Controllers\TransactionController::class,'waiting_for_approval'])->name('admin.transactions.waiting_for_approval');
    Route::get('/transactions/in_progress',[App\Http\Controllers\TransactionController::class,'in_progress'])->name('admin.transactions.in_progress');
    Route::get('/transactions/history',[App\Http\Controllers\TransactionController::class,'history'])->name('admin.transactions.history');
});