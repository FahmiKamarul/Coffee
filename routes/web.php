<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CoffeeController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HomeController;


Route::get('/output',[CoffeeController::class,'show']);




Route::get('/profile',function(){
    return(view('customer.profile'));
});
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/upload/{id}',[CoffeeController::class,'showID']);
    Route::get('/orderManagement',[CoffeeController::class,'ordermanage']);
    Route::get('/orderManagement/{button}/{id}',[CoffeeController::class,'ordermanageuser']);
    Route::get('/orderManagement/{button}',[CoffeeController::class,'ordermanage']);
    Route::put('/orderManagement/{button}', [CoffeeController::class, 'updateStatus'])->name('orders.updateStatus');
    Route::patch('/upload/{id}', [CoffeeController::class, 'update']);
    Route::get('/upload',[CoffeeController::class,'create']);
    Route::post('/upload',[CoffeeController::class,'store']);
    Route::get('/customer',[CoffeeController::class,'allcustomer']);
});
Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::middleware(['auth', 'customer'])->group(function () {
    Route::get('profile',[CoffeeController::class,'profile']);
    Route::patch('profile',[CoffeeController::class,'updateprofile']);
    Route::get('/order',[CoffeeController::class,'order']);
    Route::get('/profile/{orderId}/receipt', [CoffeeController::class, 'generateReceipt']);
    Route::get('/', [CoffeeController::class,'order']);
});
Route::middleware(['auth', 'customer','address'])->group(function () {
    Route::post('/order',[CoffeeController::class,'submitorder']);
});