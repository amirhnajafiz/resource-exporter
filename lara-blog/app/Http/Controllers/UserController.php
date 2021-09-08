<?php

namespace App\Http\Controllers;

use App\Http\Controllers\traits\user\ChangePassword;
use App\Http\Controllers\traits\user\Comment;
use App\Http\Controllers\traits\user\CreatePost;
use App\Http\Controllers\traits\user\Like;
use App\Http\Controllers\traits\user\Login;
use App\Http\Controllers\traits\user\Logout;
use App\Http\Controllers\traits\user\Love;
use App\Http\Controllers\traits\user\Register;
use App\Http\Controllers\traits\user\Save;
use App\Http\Controllers\traits\user\Update;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    use Register, Login, Logout, CreatePost, Update, ChangePassword;
    use Love, Like, Save, Comment;

    public function dashboard()
    {
        return view('components.user.dashboard')
            ->with('user', Auth::user())
            ->with('title' , 'dashboard');
    }

    public function updateview($id)
    {
        if ($id != Auth::id()) {
            return redirect()
                ->back()
                ->withErrors(['message' => 'You can\'t access here.']);
        } else {
            return view('components.user.change')
                ->with('user', Auth::user())
                ->with('title', 'profile');
        }
    }

    public function passwordview($id)
    {
        if ($id != Auth::id()) {
            return redirect()
                ->back()
                ->withErrors(['message' => 'You can\'t access here.']);
        } else {
            return view('components.user.password_change')
                ->with('user', Auth::user())
                ->with('title', 'password - change');
        }
    }

    public function viewsave()
    {
        return view('components.user.save')
            ->with('title', 'saved')
            ->with('user', Auth::user());
    }
}
