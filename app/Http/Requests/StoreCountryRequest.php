<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCountryRequest extends FormRequest
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
            'name' => "required|string|max:255",
            'country_code' => "required|string|size:2|unique:country,country_code",
            'flag' => "nullable|image|max:2048",
            'user_id' => 'nullable|exists:user,id',
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
            'name.required' => 'The country name is required.',
            'name.unique' => 'The country name already exists.',
            'country_code.required' => 'The country code is required.',
            'country_code.size' => 'The country code must be exactly 2 characters.',
            'flag.image' => 'The flag must be a valid image file.',
            'flag.max' => 'The flag must not exceed 2 MB in size.',
            'user_id.exists' => 'The selected user does not exist.',
        ];
    }
}
