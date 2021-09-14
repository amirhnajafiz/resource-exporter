<?php

namespace App\Http\Requests;

use App\Http\Requests\traits\AfterFailValidate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

/**
 * Class CreateTagRequest
 * @package App\Http\Requests
 */
class CreateTagRequest extends FormRequest
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
        return Auth::user()->is_admin == 1;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'title' => 'required|min:2|max:32'
        ];
    }

    /**
     * @return string[]
     */
    public function messages(): array
    {
        return [
            'required' => 'You must have a tag title.',
            'min' => 'Tag is too short.',
            'max' => 'Tag is too long.',
        ];
    }
}
