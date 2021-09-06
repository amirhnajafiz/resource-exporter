<?php

namespace App\Http\Controllers;

use App\Http\Controllers\traits\user\CreatePost;
use App\Http\Controllers\traits\user\Login;
use App\Http\Controllers\traits\user\Logout;
use App\Http\Controllers\traits\user\Register;
use App\Http\Controllers\traits\user\Update;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    use Register, Login, Logout, CreatePost, Update;

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
            return view('components.user.profile')
                ->with('user', Auth::user())
                ->with('title', 'profile');
        }
    }
}
