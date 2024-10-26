<?php

namespace App\Http\Requests\Promotion;

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
            'image.max' => 'Размер изображения не должен превышать 200 Мбайт',
            'image.image' => 'Изображение должно быть файлом изображения',
            'image.mimes' => 'Формат изображения не поддерживается',
            'description.required' => 'Поле Описание должно быть заполнено',
            'content.required' => 'Поле Содержание должно быть заполнено',
            'cart_content.required' => 'Поле Содержание должно быть заполнено'
        ];
    }
    public function rules(): array
    {
        return [
            'title' => ['required', 'max:240'],
            'slider' => ['nullable'],
            'image' => ['nullable', 'image', 'max:200000', 'mimes:jpeg,png,jpg,gif,svg'],
            'description'  => ['nullable'],
            'content' => ['required'],
            'cart_content' => ['required']
        ];
    }
}
