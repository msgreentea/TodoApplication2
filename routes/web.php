<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;

Route::get('/', [TodoController::class, 'index'])->name('index');
Route::post('/todo/create', [TodoController::class, 'create'])->name('create');
Route::post('/todo/update', [TodoController::class, 'update'])->name('update');
Route::post('/todo/delete', [TodoController::class, 'delete'])->name('delete');