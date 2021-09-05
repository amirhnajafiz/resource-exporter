<?php

namespace App\Http\Controllers\traits\user;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

trait Register
{
    public function register(Request $request): \Illuminate\Http\RedirectResponse
    {
        $rules = [
            'email' => 'required|email:rfc,dns',
            'phone' => 'required|regex:09(1[0-9]|3[1-9]|2[1-9])-?[0-9]{3}-?[0-9]{4}',
            'name' => 'required|max:20',
            'password' => 'required|min:8|max:20'
        ];

        $messages = [
            'required' => 'The :attribute field is required!',
            'max' => 'The :attribute must be less than :size characters.',
            'min' => 'The :attribute must be at least :size characters.'
        ];

        $validator = \Illuminate\Support\Facades\Validator::make($request->all(), $rules, $messages);
        $validated = array();

        try {
            $validated = $validator->validated();
        } catch (ValidationException $e) {
            return back()->withInput($validated);
        }

        if ($validator->fails()) {
            return back()->withInput($validated);
        }

        User::query()->create($validated);

        return redirect()
            ->route('login.page')
            ->with('message', 'User registered successfully.')
            ->with('message_type', 'success');
    }
}
