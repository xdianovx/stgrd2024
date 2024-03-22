<?php

namespace App\Http\Requests\Facilitie;

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
          'title' => ['required', 'max:70'],
          'text' => ['required'],
          'image' => 'nullable|image|max:10000',
        ];
    }
}
