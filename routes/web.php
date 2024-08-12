<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CoffeeController;

Route::get('/', [CoffeeController::class,'order']);
Route::get('/output',[CoffeeController::class,'show']);
Route::get('/upload/{id}',[CoffeeController::class,'showID'])->middleware('auth');
Route::get('/orderManagement',[CoffeeController::class,'ordermanage'])->middleware('auth');
Route::get('/orderManagement/{id}',[CoffeeController::class,'ordermanage'])->middleware('auth');
Route::patch('/upload/{id}', [CoffeeController::class, 'update'])->middleware('auth');
Route::get('/upload',[CoffeeController::class,'create'])->middleware('auth');
Route::post('/upload',[CoffeeController::class,'store'])->middleware('auth');
Route::get('/order',[CoffeeController::class,'order']);



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
