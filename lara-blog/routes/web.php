<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome')
        ->with('title', 'welcome');
})->name('welcome');

Route::get('login', function () {
    return view('components.user.login')
        ->with('title', 'login');
})->name('login.page');

Route::get('register', function () {
    return view('components.user.signup')
        ->with('title', 'sign up');
})->name('register.page');

Route::post('login', [UserController::class, 'login'])
    ->name('login');

Route::post('register', [UserController::class, 'register'])
    ->name('register');

Route::get('dashboard', [UserController::class, 'dashboard'])
    ->name('dashboard');

Route::get('logout', [UserController::class, 'logout'])
    ->name('logout');
