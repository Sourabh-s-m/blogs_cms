<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::resource('blogs', BlogController::class);
    Route::get('profile', [UserController::class, 'profile'])->name('profile');
    Route::put('profile-update', [UserController::class, 'profileUpdate'])->name('profile.update');
    // admin access only
    Route::middleware(['role:admin'])->group(function () {
        Route::resource('users', UserController::class);
    });
});
