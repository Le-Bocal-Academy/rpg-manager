<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/* Authentication */

// Login
Route::get('/connexion', [AuthController::class, 'showLogin'])->name('auth.login.show');
Route::post('/connexion', [AuthController::class, 'processLogin'])->name('auth.login.process');

// Register
Route::get('/inscription', [AuthController::class, 'showRegister'])->name('auth.register.show');
Route::post('/inscription', [AuthController::class, 'processRegister'])->name('auth.register.process');


/* User space */


// Dashboard
Route::get('/tableau-de-bord', function () {
    return "Dashboard";
})->name('dashboard');
