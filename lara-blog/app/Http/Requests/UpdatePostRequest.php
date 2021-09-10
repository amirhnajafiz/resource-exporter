<?php

namespace App\Http\Requests;

use App\Http\Requests\traits\AfterFailValidate;
use App\Models\Post;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdatePostRequest extends FormRequest
{
    use AfterFailValidate;

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        $post = Post::query()->find($this->input('post_id'));
        return $this->input('user_id') == Auth::id() && $post->user->id == $this->input('user_id');
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
            'content' => 'max:1024|min:5',
            'user_id' => 'exists:App\Models\User,id',
            'post_id' => 'exists:App\Models\Post,id'
        ];
    }

    public function messages(): array
    {
        return [
            'required' => 'You have to set a title.',
            'min' => 'The field :attribute is too short.',
            'max' => 'The field :attribute must be less than :size characters.',
            'exists' => 'Not found.'
        ];
    }
}
