<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return redirect()->route('login');
});
Route::get('/register',[UserController::class,'showRegister']);
Route::get('/login',[UserController::class,'showLogin'])->name('login');
Route::post('/register',[UserController::class,'register']);
Route::post('/login',[UserController::class,'login']);
