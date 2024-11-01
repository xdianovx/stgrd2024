<?php

namespace App\Http\Requests\RequestMails;

use Illuminate\Foundation\Http\FormRequest;

class RequestNewsletter extends FormRequest
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
    public function messages(): array
    {
        return [
            'name.required' => 'Поле Имя должно быть заполнено',
            'name.string' => 'Поле Имя должно быть строкой',
            'email.required' => 'Поле Email должно быть заполнено',
            'email.email' => 'Поле Email должно быть Email'
        ];
    }
    public function rules(): array
    {
        return [
            'name' => ['required', 'string'],
            'email' => ['required', 'email']
        ];
    }
}
