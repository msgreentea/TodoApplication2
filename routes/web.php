<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;

Route::get('/', [TodoController::class, 'index'])->name('index');
Route::get('todo/confirm', [TodoController::class, 'confirm'])->name('confirm');
Route::post('/todo/create', [TodoController::class, 'create'])->name('create');
Route::post('/update', [TodoController::class, 'update'])->name('update');
Route::post('/delete', [TodoController::class, 'delete'])->name('delete');
Route::get('/find', [TodoController::class, 'tofind'])->name('tofind');
Route::post('/find/result', [TodoController::class, 'find'])->name('find');
// Route::post('/todo/find/result', [TodoController::class, 'find'])->name('find');