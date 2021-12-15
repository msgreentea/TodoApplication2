<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;

// homeを表示
Route::get('/', [TodoController::class, 'index']);
// タスクを加える
Route::post('/todo/create', [TodoController::class, 'create']);
// タスクを更新する
Route::post('/todo/update', [TodoController::class, 'update']);
// タスクを削除する
Route::post('/todo/delete', [TodoController::class, 'delete']);