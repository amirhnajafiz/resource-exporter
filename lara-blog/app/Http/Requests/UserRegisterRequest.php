<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'email' => 'required|email:rfc,dns',
            'phone' => 'required',
            'name' => 'required|max:20',
            'password' => 'required|min:8|max:20'
        ];
    }

    public function messages(): array
    {
        return [
            'required' => 'The :attribute field is required!',
            'max' => 'The :attribute must be less than :size characters.',
            'min' => 'The :attribute must be at least :size characters.'
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            return redirect()->back()->withErrors($validator)->withInput();
        });
    }
}
