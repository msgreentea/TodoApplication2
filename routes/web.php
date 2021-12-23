<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;

Route::get('/', [TodoController::class, 'index'])->name('index');
Route::get('/todo/confirm', [TodoController::class, 'confirm'])->name('confirm');
Route::post('/todo/create', [TodoController::class, 'create'])->name('create');
Route::post('/todo/update', [TodoController::class, 'update'])->name('update');
Route::post('/todo/delete', [TodoController::class, 'delete'])->name('delete');
Route::get('/todo/find', [TodoController::class, 'tofind'])->name('tofind');
Route::post('/todo/find', [TodoController::class, 'find'])->name('find');