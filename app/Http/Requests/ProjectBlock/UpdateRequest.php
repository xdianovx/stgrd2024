<?php

namespace App\Http\Requests\ProjectBlock;

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
    public function rules(): array
    {
        return [
          'title_left' => ['required', 'max:70'],
          'active' => ['required'],
          'text_large'  => ['nullable'],
          'description' => ['nullable'],
          'description_additional' => ['nullable'],
        ];
    }
}
