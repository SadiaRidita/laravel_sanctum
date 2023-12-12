<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;


//Route::match(['get', 'post'], 'register', [AuthController::class, 'register']);
//Route::match(['get', 'post'], 'login', [AuthController::class, 'login']);
//Route::post('/login', [AuthController::class, 'login']);
//Route::get('/user', [AuthController::class, 'user']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
//Route::get('/login', 'AuthController@login')->name('login');



Route::middleware('auth:sanctum')->group(function (){
    Route::get('user',[AuthController::class,'user']);
    Route::post('logout',[AuthController::class,'logout']);
});
