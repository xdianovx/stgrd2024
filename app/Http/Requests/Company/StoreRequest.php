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
            'sphere_activity.max' => 'Поле Сфера деятельности должно содержать не более :max символов',
            'site_url.max' => 'Поле Сайт должно содержать не более :max символов',
            'address.max' => 'Поле Адрес должно содержать не более :max символов',
            'phone.max' => 'Поле Телефон должно содержать не более :max символов',
            'email.max' => 'Поле Email должно содержать не более :max символов',
        ];
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'max:70'],
            'description'  => ['nullable'],
            'sphere_activity' => ['nullable', 'max:70'],
            'site_url' => ['nullable', 'max:70'],
            'year' => ['nullable', 'numeric'],
            'address' => ['nullable', 'max:70'],
            'phone' => ['nullable', 'max:70'],
            'email' => ['nullable', 'max:70'],
        ];
    }

}

