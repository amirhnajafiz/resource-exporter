<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('components.admin.dashboard')
            ->with('title', 'admin - panel');
    }

    public function deleteUser($id): \Illuminate\Http\RedirectResponse
    {
        User::query()->find($id)->forceDelete();
        return redirect()->route('admin.users');
    }
}
