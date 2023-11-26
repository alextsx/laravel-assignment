<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SearchRequest extends FormRequest
{
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
        return [
            'searchterm' => ['required', 'regex:/^[A-Z]{3}-?[0-9]{3}$/i'],
        ];
    }

    public function messages(): array
    {
        return [
            'searchterm.regex' => 'The search term must be in the following format: ABC123, ABC-123, abc123 or abc-123',
            'searchterm.required' => 'The search term is required',
        ];
    }
}
