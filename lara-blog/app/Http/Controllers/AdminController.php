<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Class AdminController
 * @package App\Http\Controllers
 */
class AdminController extends Controller
{
    /**
     * @return Application|Factory|View|RedirectResponse
     */
    public function index()
    {
        if (Auth::user()->is_admin == 0) {
            return redirect('index', 302);
        }
        return view('components.admin.dashboard')
            ->with('title', 'admin - panel');
    }

    /**
     * @param $id
     * @return RedirectResponse
     */
    public function deleteUser($id): RedirectResponse
    {
        User::query()->find($id)->forceDelete();
        return redirect()->route('admin.users');
    }

    /**
     * @param $id
     * @return Application|Factory|View
     */
    public function viewUser($id)
    {
        $user = User::query()->findOrFail($id);
        return view('components.user.profile')
            ->with('user', $user)
            ->with('title', 'user - profile');
    }
}
