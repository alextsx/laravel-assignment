<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VehicleDamageEventRequest extends FormRequest
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
            'location' => 'required|string',
            'date' => [
                'required',
                'date',
                'before_or_equal:' . date('Y-m-d'),
            ],
            'description' => 'required|string',
            'vehicles' => 'array',
            //1 vehicle can only be added once to a damage event
            //its possible that no vehicle is added to a damage event
            'vehicles.*' => 'distinct|integer|exists:vehicles,id'
        ];
    }
}
