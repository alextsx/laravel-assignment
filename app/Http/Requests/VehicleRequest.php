<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VehicleRequest extends FormRequest
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
        $rules = [
            'brand' => 'required|string',
            'model' => 'required|string',
            'year' => [
                'required',
                'integer',
                'min:1900',
                'max:' . (date('Y') + 1),
            ],
            'license_plate' => [
                'regex:/^[A-Z]{3}-?[0-9]{3}$/i',
                'unique:vehicles,license_plate'
            ],
            'image' => 'image|max:2048', // 2MB Max
        ];

        if ($this->isMethod('POST')) {

            $rules['image'] = 'required|' . $rules['image'];
            array_unshift($rules['license_plate'], 'required');
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'brand.required' => 'The brand is required',
            'model.required' => 'The model is required',
            'year.required' => 'The year is required',
            'year.integer' => 'The year must be a number',
            'year.min' => 'The year must be at least 1900',
            'year.max' => 'The year cannot be in the future',
            'license_plate.required' => 'The license plate is required',
            'license_plate.regex' => 'The license plate must be in the following format: ABC123, ABC-123, abc123 or abc-123',
            'license_plate.unique' => 'The license plate is already in use',
            'image.required' => 'The image is required',
            'image.image' => 'The image must be a valid image',
            'image.max' => 'The image cannot be larger than 2MB',
        ];
    }
}
