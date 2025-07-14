<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\SingleActionController;
use App\Http\Middleware\endMiddleware;
use App\Http\Middleware\startMiddleware;
use Illuminate\Support\Facades\Route;


Route::get('/',[MainController::class,'index'])->name('index');
Route::get('/about',[MainController::class,'about'])->name('about');
Route::get('/contact',[MainController::class,'contact'])->name('contact');




