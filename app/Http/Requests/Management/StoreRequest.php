<?php

namespace App\Http\Requests\Management;

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
            'position.required' => 'Поле Должность должно быть заполнено',
            'position.max' => 'Поле Должность должно содержать не более :max символов',
            'image.required' => 'Поле Изображение должно быть заполнено',
            'image.max' => 'Размер изображения не должен превышать 200 Мбайт',
            'image.image' => 'Изображение должно быть файлом изображения',
            'image.mimes' => 'Формат изображения не поддерживается',
            'phone.required' => 'Поле Телефон должно быть заполнено',
            'phone.max' => 'Поле Телефон должно содержать не более :max символов',
            'email.required' => 'Поле Email должно быть заполнено',
            'email.max' => 'Поле Email должно содержать не более :max символов',
        ];
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'max:70'],
            'position'  => ['required', 'max:140'],
            'image' => ['required', 'image', 'max:200000', 'mimes:jpeg,png,jpg,gif,svg'],
            'phone' => ['required', 'max:70'],
            'email' => ['required', 'max:70'],
        ];
    }

}

