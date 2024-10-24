<?php

namespace App\Http\Requests\PlanningSolution;

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
          'type' => ['required', 'max:70'],
          'square' => ['required', 'max:70'],
          'ipoteka' => ['required', 'max:70'],
          'price' => ['required', 'max:70'],
          'plan' => 'nullable|image|max:10000',
        ];
    }
}
