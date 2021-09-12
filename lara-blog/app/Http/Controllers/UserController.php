<?php

namespace App\Http\Controllers;

use App\Http\Controllers\traits\user\crud\ChangePassword;
use App\Http\Controllers\traits\user\features\Comment;
use App\Http\Controllers\traits\user\features\Like;
use App\Http\Controllers\traits\user\Login;
use App\Http\Controllers\traits\user\Logout;
use App\Http\Controllers\traits\user\features\Love;
use App\Http\Controllers\traits\user\crud\Register;
use App\Http\Controllers\traits\user\features\Save;
use App\Http\Controllers\traits\user\crud\Update;
use App\Http\Controllers\traits\user\view\PasswordView;
use App\Http\Controllers\traits\user\view\SaveView;
use App\Http\Controllers\traits\user\view\UpdateView;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    use Register, Login, Logout, Update, ChangePassword;
    use Love, Like, Save, Comment;
    use UpdateView, PasswordView, SaveView;

    public function index()
    {
        $users = User::all();
        return view('components.admin.users')
            ->with('users', $users)
            ->with('title', 'users');
    }

    public function dashboard()
    {
        return view('components.user.dashboard')
            ->with('user', Auth::user())
            ->with('title' , 'dashboard');
    }
}
