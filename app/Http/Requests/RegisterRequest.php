<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'username' => 'required|string|max:255|unique:users,username',
            'phone' => ['required','string', 'max:20', 'regex:/^[\+]?[\d\s\-\(\)]{7,}$/', 'unique:users,phone'],
        ];
    }

    public function attributes()
    {
        return [
            'phone' => __('validation.phone'),
            'username' => __('validation.username'),
        ];
    }

    public function messages()
    {
        return [
            'phone.regex' => __('validation.incorrect_phone_number'),
        ];
    }
}
