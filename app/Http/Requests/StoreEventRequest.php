<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEventRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;  // Set to true to allow the request
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'date' => 'required|date',  // Changed from integer to date to validate the date correctly
            'hour' => 'required|date_format:H:i',  // Changed from integer to hour format
            'description' => 'required|string',
            'image_cover' => 'required|image|max:2048',
        ];
    }

    /**
     * Get the custom messages for validation errors.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name.required' => 'The name field is required.',
            'name.string' => 'The name field must be a string.',
            'name.max' => 'The name field may not exceed 255 characters.',

            'date.required' => 'The date field is required.',
            'date.date' => 'The date field must be a valid date.',

            'hour.required' => 'The time field is required.',
            'hour.date_format' => 'The time field must be in the correct format (hours only).',

            'description.required' => 'The description field is required.',
            'description.string' => 'The description field must be a string.',

            'image_cover.required' => 'The cover image field is required.',
            'image_cover.image' => 'The cover image must be a valid image file.',
            'image_cover.max' => 'The cover image may not be larger than 2048 kilobytes.',
        ];
    }
}