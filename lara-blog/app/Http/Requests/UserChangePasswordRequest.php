<?php

namespace App\Http\Requests;

use App\Http\Requests\traits\AfterFailValidate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

/**
 * Class UserChangePasswordRequest
 * @package App\Http\Requests
 */
class UserChangePasswordRequest extends FormRequest
{
    // Traits
    use AfterFailValidate;

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return $this->input('user') == Auth::id();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'old_password' => 'required|max:20|min:3',
            'password' => 'required|max:20|min:3'
        ];
    }

    /**
     * @return string[]
     */
    public function messages(): array
    {
        return [
            'required' => 'The :attribute field is required!',
            'max' => 'The :attribute must be less than :size characters.',
            'min' => 'The :attribute must be at least :size characters.'
        ];
    }
}
