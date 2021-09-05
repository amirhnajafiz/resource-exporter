<?php

namespace App\Http\Controllers;

use App\Http\Controllers\traits\user\Login;
use App\Http\Controllers\traits\user\Register;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    use Register, Login;

    public function dashboard()
    {
        return view('components.user.dashboard')
            ->with('user', Auth::user())
            ->with('title' , 'dashboard');
    }
}
