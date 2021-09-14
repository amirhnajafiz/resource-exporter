<?php

namespace App\Http\Controllers\traits\user\view;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

/**
 * Trait UpdateView
 * @package App\Http\Controllers\traits\user\view
 */
trait UpdateView
{
    /**
     * @param $id
     * @return Application|Factory|View|RedirectResponse
     */
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
}
