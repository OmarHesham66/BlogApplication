<?php

namespace App\Http\Requests;

use App\Traits\HandleValidationResponse;
use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
                'name' => 'sometimes|required|string|max:100',
                'description' => 'sometimes|required|string',
            ];
        }
        return [
            'name' => 'required|string|max:100',
            'description' => 'required|string',
        ];
    }
}
