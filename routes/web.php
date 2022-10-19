<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AdministratorController;



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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::group(['prefix' => 'users'], function(){
//     Route::get('', [UserController::class, 'index'])->name('user.index');
//     Route::get('create', [UserController::class, 'create'])->name('user.create');
//     Route::post('store', [UserController::class, 'store'])->name('user.store');
//     Route::get('edit/{user}', [UserController::class, 'edit'])->name('user.edit');
//     Route::post('update/{user}', [UserController::class, 'update'])->name('user.update');
//     Route::post('delete/{user}', [UserController::class, 'destroy'])->name('user.destroy');
//     Route::get('show/{user}', [UserController::class, 'show'])->name('user.show');
//  });
 
 Route::group(['prefix' => 'books'], function(){
    Route::get('', [BookController::class, 'index'])->name('book.index');
    Route::get('create', [BookController::class, 'create'])->name('book.create');
    Route::post('store', [BookController::class, 'store'])->name('book.store');
    Route::get('edit/{book}', [BookController::class, 'edit'])->name('book.edit');
    Route::post('update/{book}', [BookController::class, 'update'])->name('book.update');
    Route::post('delete/{book}', [BookController::class, 'destroy'])->name('book.destroy');
    Route::get('show/{book}', [BookController::class, 'show'])->name('book.show');
 });
 
 Route::group(['prefix' => 'administrator'], function(){
    Route::get('', [AdministratorController::class, 'index'])->name('administrator.index');//pamatyti visus userius
    Route::get('create', [AdministratorController::class, 'create'])->name('administrator.create');//visi kiti - userio crud
    Route::post('store', [AdministratorController::class, 'store'])->name('administrator.store');
    Route::get('edit/{user}', [AdministratorController::class, 'edit'])->name('user.edit');
    Route::post('update/{user}', [AdministratorController::class, 'update'])->name('user.update');
    Route::post('delete/{user}', [AdministratorController::class, 'destroy'])->name('user.destroy');
    Route::get('show/{book}', [AdministratorController::class, 'show'])->name('administrator.show');
 });

