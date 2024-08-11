<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CoffeeController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/output',[CoffeeController::class,'show']);
Route::get('/upload/{id}',[CoffeeController::class,'showID']);
Route::get('/orderManagement',[CoffeeController::class,'ordermanage']);
Route::get('/orderManagement/{id}',[CoffeeController::class,'ordermanage']);
Route::patch('/upload/{id}', [CoffeeController::class, 'update']);
Route::get('/upload',[CoffeeController::class,'create']);
Route::post('/upload',[CoffeeController::class,'store']);
Route::get('/order',[CoffeeController::class,'order']);



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
