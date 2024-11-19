<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStateRequest extends FormRequest
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
            'state_code' => "required|string|size:3|unique:states,code,{$this->state->id}",
            'country_id' => 'required|exists:countries,id',
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
            'name.required' => 'The state name is required.',
            'name.string' => 'The state name must be a string.',
            'name.max' => 'The state name is too long.',
            'code.required' => 'The state code is required.',
            'code.size' => 'The state code must be exactly 3 characters.',
            'country_id.exists' => 'The selected country does not exist.',
            'user_id.exists' => 'The selected user does not exist.',
        ];
    }
}
