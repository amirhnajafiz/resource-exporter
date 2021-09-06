<?php

use App\Http\Controllers\PostController;
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

// Welcome route
Route::get('/', function () {
    return view('welcome')
        ->with('title', 'welcome');
})->name('welcome');

// Login, register routes
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

// Auth needed routes
Route::middleware(['auth'])->group(function () {
    Route::get('index', function () {
        return view('components.public.index')
            ->with('title', 'public');
    })->name('index');

    Route::get('dashboard', [UserController::class, 'dashboard'])
        ->name('dashboard');

    Route::get('logout', [UserController::class, 'logout'])
        ->name('logout');

    Route::get('create', function () {
        return view('components.post.create')
            ->with('title', 'create post');
    })->name('create.post.page');

    Route::put('create', [UserController::class, 'create'])
        ->name('create.post');

    Route::get('post/{id?}', [PostController::class, 'viewpost'])
        ->name('view.post');

    Route::delete('delete/{id?}', [PostController::class, 'delete'])
        ->name('delete.post');

    Route::get('trash/{id?}', [PostController::class, 'viewtrash'])
        ->name('trash');

    Route::delete('force/{id}', [PostController::class, 'force'])
        ->name('force.post');

    Route::patch('restore/{id}', [PostController::class, 'restore'])
        ->name('restore.post');

    Route::get('update/{id?}', [PostController::class, 'updateview'])
        ->name('update.post.page');

    Route::put('update', [PostController::class, 'update'])
        ->name('update.post');

    Route::get('change/{id}', [UserController::class, 'updateview'])
        ->name('update.user.page');
});
