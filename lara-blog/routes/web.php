<?php

use App\Http\Controllers\AdminController;
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
    Route::get('index', [PostController::class, 'index'])
        ->name('index');

    Route::get('dashboard', [UserController::class, 'dashboard'])
        ->name('dashboard');

    Route::get('logout', [UserController::class, 'logout'])
        ->name('logout');

    Route::get('create', [PostController::class, 'createview'])
        ->name('create.post.page');

    Route::post('create', [PostController::class, 'create'])
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

    Route::patch('change', [UserController::class, 'update'])
        ->name('update.user');

    Route::get('password_change/{id}', [UserController::class, 'passwordview'])
        ->name('password.change.page');

    Route::patch('password_change', [UserController::class, 'changePassword'])
        ->name('password.change');

    Route::get('love/{id}', [UserController::class, 'love'])
        ->name('love');

    Route::get('like/{id}', [UserController::class, 'like'])
        ->name('like');

    Route::get('save/{id}', [UserController::class, 'save'])
        ->name('save');

    Route::get('view/save', [UserController::class, 'viewsave'])
        ->name('view.save');

    Route::get('view/draft/{id}', [PostController::class, 'viewdraft'])
        ->name('view.draft');

    Route::patch('draft/publish/{id}', [PostController::class, 'publish'])
        ->name('publish');

    Route::post('comment', [UserController::class, 'comment'])
        ->name('comment');

    Route::get('search/{offset?}', [PostController::class, 'search'])
        ->name('search');

    Route::get('user/view/{id}', [AdminController::class, 'viewUser'])
        ->name('user.view');

    Route::get('download/{id}', [PostController::class, 'downloadPostImage'])
        ->name('download');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('tags', \App\Http\Controllers\TagController::class);

    Route::resource('categories', \App\Http\Controllers\CategoryController::class);

    Route::get('admin/dashboard', [AdminController::class, 'index'])
        ->name('admin.dash');

    Route::get('admin/users', [UserController::class, 'index'])
        ->name('admin.users');

    Route::get('admin/posts/{offset?}', [PostController::class, 'allPosts'])
        ->name('admin.posts');

    Route::delete('users/{id}/delete', [AdminController::class, 'deleteUser'])
        ->name('delete.user');
});
