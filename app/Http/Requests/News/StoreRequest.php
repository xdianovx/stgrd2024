<?php

namespace App\Http\Requests\News;

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
    public function rules(): array
    {
        return [
            'title' => ['required', 'max:70'],
            'image' => 'required|image|max:10000',
            'slug' => ['required', 'max:70'],
            'description'  => ['nullable'],
            'content' => ['nullable'],
            'projects' => 'nullable|array',
            'projects.*' => 'nullable|string|exists:projects,title',
        ];
    }
}
