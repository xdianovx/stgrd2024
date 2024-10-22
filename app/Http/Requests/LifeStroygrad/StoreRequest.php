<?php

namespace App\Http\Requests\LifeStroygrad;

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
            'description.max' => 'Поле Описание должно содержать не более :max символов',
            'image.max' => 'Размер изображения не должен превышать 200 Мбайт',
            'image.image' => 'Изображение должно быть файлом изображения',
            'image.mimes' => 'Формат изображения не поддерживается',
            'image.required' => 'Поле Изображение должно быть заполнено',
        ];
    }
    public function rules(): array
    {
        return [
            'title' => ['required', 'max:70'],
            'description'  => ['nullable', 'max:923'],
            'image' => ['required', 'image', 'max:200000', 'mimes:jpeg,png,jpg,gif,svg'],
        ];
    }
}

