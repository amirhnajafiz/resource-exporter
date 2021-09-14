<?php

namespace App\Http\Controllers;

use App\Http\Controllers\traits\user\crud\ChangePassword;
use App\Http\Controllers\traits\user\features\Commenting;
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
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

/**
 * Class UserController
 * @package App\Http\Controllers
 */
class UserController extends Controller
{
    // Traits
    use Register, Login, Logout, Update, ChangePassword;
    use Love, Like, Save, Commenting;
    use UpdateView, PasswordView, SaveView;

    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        $users = User::all();
        return view('components.admin.users')
            ->with('users', $users)
            ->with('title', 'users');
    }

    /**
     * @return Application|Factory|View
     */
    public function dashboard()
    {
        return view('components.user.dashboard')
            ->with('user', Auth::user())
            ->with('title' , 'dashboard');
    }
}
