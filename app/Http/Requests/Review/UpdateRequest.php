<?php

namespace App\Http\Requests\Review;

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
            'position.required' => 'Поле Позиция должно быть заполнено',
            'position.max' => 'Поле Позиция должно содержать не более :max символов',
            'photo.required' => 'Поле Изображение должно быть заполнено',
            'photo.image' => 'Поле Фото должно быть изображением',
            'photo.max' => 'Поле Фото должно быть не более 200 Мбайт',
            'photo.mimes' => 'Поле Фото должно быть одного из следующих типов: :values',
            'video.required' => 'Поле Видео должно быть заполнено',
            'video.file' => 'Поле Видео должно быть файлом',
            'video.max' => 'Поле Видео должно быть не более 200 Мбайт',
            'video.mimes' => 'Поле Видео должно быть одного из следующих типов: :values',
        ];
    }
    public function rules(): array
    {
        return [
            'title' => ['required', 'max:70'],
            'position'  => ['required', 'max:140'],
            'photo' => ['required', 'image', 'max:200000', 'mimes:jpeg,png,jpg,gif,svg'],
            'video' => 'required|file|max:200000|mimes:jpeg,png,jpg,gif,svg,mp4,mov,ogg',
        ];
    }
}
