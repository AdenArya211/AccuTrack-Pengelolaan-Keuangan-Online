<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PendapatanController;

Route::get('/kelola', [PendapatanController::class,'index']);
Route::get('/entry', [PendapatanController::class,'entry']);
Route::get('/edit/{id}', [PendapatanController::class,'edit']);
Route::post('/store', [PendapatanController::class,'store']);
Route::post('/update/{id}', [PendapatanController::class,'update']);
Route::get('/destroy/{id}', [PendapatanController::class,'destroy']);

Route::get('/', function () {
    return view('welcome');
});
