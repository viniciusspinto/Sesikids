<?php

use App\Http\Controllers\API\apiController;
use App\Http\Controllers\LoginController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');
Route::post('/login', [LoginController::class, 'loginProcess'])->name('login.process');

Route::group(['middleware' => ['auth:sanctum']], function(){
    Route::get('/user', [apiController::class, 'index']);
    Route::get('/user/{user}', [apiController::class, 'show']);
    Route::post('/user', [apiController::class, 'store']);
    Route::put('/user/{user}', [apiController::class, 'update']);
    Route::delete('/user/{user}', [apiController::class, 'destroy']);
    Route::put('/user-password/{user}', [apiController::class, 'updatePassword']);
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});



