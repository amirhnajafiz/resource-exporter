<?php

namespace App\Http\Controllers\traits\user;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

trait Update
{
    public function update(Request $request): \Illuminate\Http\RedirectResponse
    {
        $rules = [
            'email' => 'required|email:rfc,dns',
            'phone' => 'required',
            'name' => 'required|max:20|min:3',
        ];

        $messages = [
            'required' => 'The :attribute field is required!',
            'max' => 'The :attribute must be less than :size characters.',
            'min' => 'The :attribute must be at least :size characters.'
        ];

        $validator = \Illuminate\Support\Facades\Validator::make($request->all(), $rules, $messages);

        $validator->after(function ($validator) {
            return redirect()->back()->withErrors($validator)->withInput();
        });

        $validated = $validator->validate();

        if ($validated['email'] != Auth::user()->email) {
            return redirect()
                ->back()
                ->withErrors(['message' => 'You can\'t edit other peoples profile.'])
                ->withInput();
        }

        unset($validated['user_id']);

        User::query()->where('id', '=', Auth::id())->update($validated);

        return redirect()
            ->route('dashboard');
    }
}
