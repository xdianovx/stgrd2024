<?php

namespace App\Http\Requests\Number;

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
            'num.required' => 'Поле Число должно быть заполнено',
            'num.max' => 'Поле Число должно содержать не более :max символов',
            'num_text.max' => 'Поле Текст должно содержать не более :max символов',
        ];
    }
    public function rules(): array
    {
        return [
            'title' => ['required', 'max:70'],
            'num' => ['required', 'max:7'],
            'num_text'  => ['nullable', 'max:7'],
        ];
    }
}
