<?php

namespace App\Http\Controllers\traits\user\view;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

/**
 * Trait PasswordView
 * @package App\Http\Controllers\traits\user\view
 */
trait PasswordView
{
    /**
     * @param $id
     * @return Application|Factory|View|RedirectResponse
     */
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
}
