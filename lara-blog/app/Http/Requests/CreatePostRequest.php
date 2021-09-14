<?php

namespace App\Http\Requests;

use App\Http\Requests\traits\AfterFailValidate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

/**
 * Class CreatePostRequest
 * @package App\Http\Requests
 */
class CreatePostRequest extends FormRequest
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
        return $this->input('user_id') == Auth::id();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'title' => 'required|max:50|min:2',
            'content' => 'max:128|min:5',
            'user_id' => 'exists:App\Models\User,id',
            'tags_id' => 'required|array',
            'tags_id.*' => 'required|exists:App\Models\Tag,id',
            'categories_id' => 'required|array',
            'categories_id.*' => 'required|exists:App\Models\Category,id'
        ];
    }

    /**
     * @return string[]
     */
    public function messages(): array
    {
        return [
            'required' => 'You have to set :attribute.',
            'min' => 'The field :attribute is too short.',
            'max' => 'The field :attribute must be less than :size characters.',
            'exists' => 'No :attribute found.'
        ];
    }
}
