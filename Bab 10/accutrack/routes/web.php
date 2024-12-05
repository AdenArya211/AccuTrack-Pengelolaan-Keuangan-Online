<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PendapatanController;
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

Route::get('/kelola', [PendapatanController::class,'index']);
Route::get('/entry', [PendapatanController::class,'entry']);
Route::get('/edit/{id}', [PendapatanController::class,'edit']);
Route::post('/store', [PendapatanController::class,'store']);
Route::post('/update/{id}', [PendapatanController::class,'update']);
Route::get('/destroy/{id}', [PendapatanController::class,'destroy']);
Route::get('/cetak',[PendapatanController::class,'cetak']);

Route::get('/', function () {
    return view('welcome');
});
