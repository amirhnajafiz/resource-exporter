<?php

namespace App\Http\Requests;

use App\Http\Requests\traits\AfterFailValidate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

/**
 * Class SearchRequest
 * @package App\Http\Requests
 */
class SearchRequest extends FormRequest
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
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'keyword' => 'required|max:64'
        ];
    }
}
