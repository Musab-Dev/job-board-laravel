<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\JobApplicationController;
use App\Http\Controllers\JobController;
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

Route::get('/', fn() => to_route('jobs.index'));

Route::resource('jobs', JobController::class);
// Any route defined inside the group function
// will apply the same middelware
Route::middleware('auth')->group(function () {
    Route::resource('jobs.applications', JobApplicationController::class)
        ->only(['create', 'store', 'destroy'])
        ->scoped();
});

/* Auth Routes */
Route::get('/auth/login', [AuthController::class, 'login'])->name('login');
Route::post('/auth/login', [AuthController::class, 'loginPost'])->name('login.post');
// SECURITY: make logout as delete request
// to ensure the csrf token
Route::delete('/auth/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/auth/register', [AuthController::class, 'register'])->name('register');
Route::post('/auth/register', [AuthController::class, 'registerPost'])->name('register.post');