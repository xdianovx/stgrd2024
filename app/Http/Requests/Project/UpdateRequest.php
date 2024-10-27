<?php

namespace App\Http\Requests\Project;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
            'title.required' => 'Поле Название является обязательным',
            'title.max' => 'Поле Название содержит не более :max символов',
            'title.string' => 'Поле Название должно быть строкой',
            'title.unique' => 'Такой проект уже существует',
            'image.required' => 'Поле Фото является обязательным',
            'image.image' => 'Файл, который вы загрузили, не является изображением',
            'image.max' => 'Размер файла, который вы загрузили, превышает :max килобайт',
            'image.mimes' => 'Фото должно быть в формате :values',
            'year_delivery.required' => 'Поле Год сдачи является обязательным',
            'year_delivery.string' => 'Поле Год сдачи должно быть строкой',
            'year_delivery.max' => 'Поле Год сдачи содержит не более :max символов',
            'number_rooms.required' => 'Поле Количество квартир является обязательным',
            'description.required' => 'Поле Описание является обязательным',
            'link.required' => 'Поле Ссылка является обязательным',
            'link.string' => 'Поле Ссылка должно быть строкой',
            'link.max' => 'Поле Ссылка содержит не более :max символов',
            'comfort.required' => 'Поле Удобства должно быть заполнено',
            'comfort.*.required' => 'Поле Удобства должно быть заполнено',
            'city_id.required' => 'Поле Город является обязательным',
            'status_id.required' => 'Поле Статус является обязательным',
        ];
    }
    public function rules(): array
    {
        return [
            'title' => ['required', 'max:70', 'string', Rule::unique('projects')->ignore($this->old_title, 'title')],
            'image' => ['nullable', 'image', 'max:200000', 'mimes:jpeg,png,jpg,gif,svg'],
            'year_delivery' => ['required', 'string', 'max:70'],
            'number_rooms' => ['required'],
            'description' => ['required'],
            'link' => ['required', 'string', 'max:240'],
            'comfort' => ['required', 'array'],
            'comfort.*' => ['required', 'string'],
            'home' => ['nullable'],
            'city_id' => ['required'],
            'status_id' => ['required'],
        ];
    }
}
