<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{PersonneController,LoginController};


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::get('/personne',[PersonneController::class,'index'])->middleware('auth:sanctum')->name('index');
Route::get('/personne',[PersonneController::class,'index'])->name('index');
Route::post('/personne',[PersonneController::class,'store'])->name('personne.store');
Route::get('/personne/{id}',[PersonneController::class,'edit'])->name('personne.show');
Route::put('/personne/update/{id}',[PersonneController::class,'update'])->name('personne.update');
Route::delete('/personne/{id}',[PersonneController::class,'destroy'])->name('personne.destroy');

Route::post('/register',[LoginController::class,'register'])->name('register');
Route::post('/login',[LoginController::class,'login'])->name('login');
Route::get('/logout',[LoginController::class,'logout'])->middleware('auth:sanctum')->name('logout');
