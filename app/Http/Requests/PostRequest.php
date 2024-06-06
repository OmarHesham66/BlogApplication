<?php

namespace App\Http\Requests;

use App\Traits\HandleValidationResponse;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

class PostRequest extends FormRequest
{
    // use HandleValidationResponse;
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        if ($this->method() == 'PUT') {
            return [
                'title' => 'sometimes|required|string|max:50',
                'content' => 'sometimes|required|string',
                'media' => 'sometimes|required|file'
            ];
        }
        return [
            'title' => 'required|string|max:50',
            'content' => 'required|string',
            'media' => 'required|file'
        ];
    }
}
