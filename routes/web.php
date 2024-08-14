<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CoffeeController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HomeController;

Route::get('/', [CoffeeController::class,'order']);
Route::get('/output',[CoffeeController::class,'show']);

Route::get('/order',[CoffeeController::class,'order'])->middleware('customer');
Route::post('/order',[CoffeeController::class,'submitorder'])->middleware('customer');
Route::get('/profile',function(){
    return(view('customer.profile'));
});
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/upload/{id}',[CoffeeController::class,'showID']);
    Route::get('/orderManagement',[CoffeeController::class,'ordermanage']);
    Route::get('/orderManagement/{id}',[CoffeeController::class,'ordermanage']);
    Route::patch('/upload/{id}', [CoffeeController::class, 'update']);
    Route::get('/upload',[CoffeeController::class,'create']);
    Route::post('/upload',[CoffeeController::class,'store']);
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::middleware(['auth', 'customer'])->group(function () {
    Route::get('profile',[CoffeeController::class,'profile']);
    Route::patch('profile',[CoffeeController::class,'updateprofile']);
});
