<?php

namespace App\Http\Requests\Company;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'title.required' => 'Поле Название должно быть заполнено',
            'title.max' => 'Поле Название должно содержать не более :max символов',
            'year.numeric' => 'Поле Год основания должно быть числом',
        ];
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'max:70'],
            'description'  => ['nullable'],
            'sphere_activity' => ['nullable'],
            'site_url' => ['nullable'],
            'year' => ['nullable', 'numeric'],
            'address' => ['nullable'],
            'phone' => ['nullable'],
            'email' => ['nullable'],
        ];
    }

}

