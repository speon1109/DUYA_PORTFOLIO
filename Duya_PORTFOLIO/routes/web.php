<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProjectController;

Route::get('/', function () {
    return view('home');
});
Route::get('/register',[UserController::class,'showRegister']);
Route::get('/login',[UserController::class,'showLogin'])->name('login');
Route::post('/register',[UserController::class,'register']);
Route::post('/login',[UserController::class,'login']);
Route::get('/showAll',[ProjectController::class,'showProjects'])->middleware('auth')->name('showProjects');
Route::get('/showAllGuest',[ProjectController::class,'showProjectsGuest'])->name('showProjectsGuest');
Route::post('/createProject',[ProjectController::class,'createProject'])->middleware('auth');
Route::put('/updateProject/{project}',[ProjectController::class,'updateProject'])->middleware('auth');
Route::delete('/destroyProject/{project}',[ProjectController::class,'destroyProject'])->middleware('auth');
Route::post('/logout',[UserController::class,'logout'])->middleware('auth');

