<?php

namespace App\Http\Requests\PlanningSolution;

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
        'number_rooms.required' => 'Поле Количество комнат является обязательным',
        'number_rooms.string' => 'Поле Количество комнат должно быть строкой',
        'number_rooms.max' => 'Поле Количество комнат содержит не более :max символов',
        'number_square_meters.required' => 'Поле Количество квадратных метров является обязательным',
        'number_square_meters.numeric' => 'Поле Количество квадратных метров должно быть числом',
        'number_square_meters.max' => 'Поле Количество квадратных метров содержит не более :max символов',
        'price.required' => 'Поле Цена является обязательным',
        'price.numeric' => 'Поле Цена должно быть числом',
        'price.max' => 'Поле Цена содержит не более :max символов',
    ];
}
    public function rules(): array
    {
        return [
            'number_rooms' => ['required', 'string', 'max:70'],
            'number_square_meters' => ['required', 'numeric', 'max:70'],
            'price' => ['required', 'numeric', 'max:70'],
        ];
    }
}
