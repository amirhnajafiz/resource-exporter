<?php

namespace App\Http\Requests;

use App\Http\Requests\traits\AfterFailValidate;
use Illuminate\Foundation\Http\FormRequest;

/**
 * Class CreateCommentRequest
 * @package App\Http\Requests
 */
class CreateCommentRequest extends FormRequest
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
            'post_id' => 'required|exists:posts,id',
            'comment' => 'required|min:3|max:64'
        ];
    }

    /**
     * @return string[]
     */
    public function messages(): array
    {
        return [
            'required' => 'You need to have :attribute.',
            'exists' => 'The post was not found.',
            'min' => 'Comment is too short.',
            'max' => 'Comment is too long.'
        ];
    }
}
