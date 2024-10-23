<?php

namespace App\Http\Requests\Advantage;

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
            'num.required' => 'Поле Число должно быть заполнено',
            'num.max' => 'Поле Число должно содержать не более :max символов',
            'description.max' => 'Поле Описание должно содержать не более :max символов',
            'image.max' => 'Размер изображения не должен превышать 200 Мбайт',
            'image.image' => 'Изображение должно быть файлом изображения',
            'image.mimes' => 'Формат изображения не поддерживается',
        ];
    }
    public function rules(): array
    {
        return [
            'title' => ['required', 'max:70'],
            'num' => ['required', 'max:6'],
            'description'  => ['nullable', 'max:923'],
            'image' => ['nullable', 'image', 'max:200000', 'mimes:jpeg,png,jpg,gif,svg'],
        ];
    }
}
