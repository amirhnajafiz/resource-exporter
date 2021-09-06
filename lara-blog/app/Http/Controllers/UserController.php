<?php

namespace App\Http\Controllers;

use App\Http\Controllers\traits\user\CreatePost;
use App\Http\Controllers\traits\user\Login;
use App\Http\Controllers\traits\user\Logout;
use App\Http\Controllers\traits\user\Register;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    use Register, Login, Logout, CreatePost;

    public function dashboard()
    {
        return view('components.user.dashboard')
            ->with('user', Auth::user())
            ->with('title' , 'dashboard');
    }

    public function viewpost($id = -1)
    {
        $post = Post::query()->findOrFail($id);

        return view('components.post.post_view')
            ->with('post', $post)
            ->with('title', 'post - view');
    }
}
