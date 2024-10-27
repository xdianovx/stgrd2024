<?php

namespace App\Http\Requests\Contact;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'address.required' => 'Поле Адрес должно быть заполнено',
            'phone.required' => 'Поле Телефон должно быть заполнено',
            'phone.*.required' => 'Поле Телефон должно быть заполнено',
            'longitude.required' => 'Поле Широта должно быть заполнено',
            'latitude.required' => 'Поле Долгота должно быть заполнено',
            'longitude.numeric' => 'Поле Широта должно быть числом',
            'latitude.numeric' => 'Поле Долгота должно быть числом',
        ];
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'max:255'],
            'address' => ['required', 'string'],
            'phone' => ['required', 'array'],
            'phone.*' => ['required', 'string'],
            'longitude' => ['required', 'numeric'],
            'latitude' => ['required', 'numeric'],
            'city_id' => ['required'],
        ];
    }

}
