<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCityRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => "required|string|max:255",
            'state_id' => 'required|exists:states,id',
            'user_id' => 'nullable|exists:users,id',
        ];
    }

    /**
     * Customized error messages.
     *
     * @return array<string, mixed>
     */
    public function messages(): array
    {
        return [
            'name.required' => 'The city name is required.',
            'name.string' => 'The city name must be a string.',
            'name.max' => 'The city name is too long.',
            'state_id.exists' => 'The selected state does not exist.',
            'user_id.exists' => 'The selected user does not exist.',
        ];
    }
}
