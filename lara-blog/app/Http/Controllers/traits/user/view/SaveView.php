<?php

namespace App\Http\Controllers\traits\user\view;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

/**
 * Trait SaveView
 * @package App\Http\Controllers\traits\user\view
 */
trait SaveView
{
    /**
     * @return Application|Factory|View
     */
    public function viewsave()
    {
        return view('components.user.save')
            ->with('title', 'saved')
            ->with('user', Auth::user());
    }
}
