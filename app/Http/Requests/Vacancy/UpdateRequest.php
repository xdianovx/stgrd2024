<?php

namespace App\Http\Requests\Vacancy;

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
            'expirience.required' => 'Поле Требуемый опыт должно быть заполнено',
            'salary.required' => 'Поле Зарплата должно быть заполнено',
            'duties.required' => 'Поле Обязанности должно быть заполнено',
            'terms.required' => 'Поле Условия должно быть заполнено',
            'reqs.required' => 'Поле Требования должно быть заполнено',
            'city_id.required' => 'Поле Город должно быть заполнено',
            'city_id.exists' => 'Поле Город должно быть существующей',
        ];
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'max:255'],
            'expirience' => ['required', 'string'],
            'salary' => ['required', 'string'],
            'duties' => ['required', 'string'],
            'terms' => ['required', 'string'],
            'reqs' => ['required', 'string'],
            'city_id' => ['required'],
        ];
    }
}
