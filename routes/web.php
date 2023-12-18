<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
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
Route::get('/', [PostController::class, 'show'])->name('show');

Route::get('/create', [PostController::class, 'create'])->name('create');

Route::get('/edit/{id}', [PostController::class, 'edit'])->name('edit');
Route::patch('/update/{id}', [PostController::class, 'updatePost'])->name('updatePost');

Route::post('/addPost', [PostController::class, 'addPost'])->name('addPost');

Route::delete('/delete/{id}', [PostController::class, 'deletePost'])->name('deletePost');