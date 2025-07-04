<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\BrandApiController;
use App\Http\Controllers\Api\AuthApiController;
use App\Http\Controllers\Api\UserApiController; 


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/login', [AuthApiController::class, 'login']);

 
Route::get('/users', [UserApiController::class, 'index']);       // عرض كل المستخدمين
Route::get('/users/{id}', [UserApiController::class, 'show']);   // عرض مستخدم محدد
