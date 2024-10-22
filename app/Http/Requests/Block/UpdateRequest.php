<?php

namespace App\Http\Requests\Block;

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
        'title.required' => 'Поле Заголовок должно быть заполнено',
        'title.max' => 'Поле Заголовок должно содержать не более :max символов',
        'title_left.required' => 'Поле Заголовок слева должно быть заполнено',
        'title_left.max' => 'Поле Заголовок слева должно содержать не более :max символов',
      ];
  }
  public function rules(): array
  {
      return [
          'title' => ['required', 'max:70'],
          'title_left' => ['required', 'max:70'],
          'text_large'  => ['nullable'],
          'description' => ['nullable'],
          'description_additional' => ['nullable'],
          'active' => ['required'],
      ];
  }
}
