<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BrandController;

Route::get('/', function () {
    return view('welcome');
});


Route::middleware('auth')->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');


Route::resource('brand', BrandController::class);


Route::get('/settings', function () {

})->middleware(['auth_user', 'is_admin']);
