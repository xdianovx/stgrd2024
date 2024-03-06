<?php

namespace App\Http\Requests\Blog;

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
            'title' => ['required', 'max:70'],
            'h1_title'=> ['required', 'max:70'],
            'slug' => ['required', 'max:70'],
            'image' => 'nullable|image',
            'video' => 'mimes:mp4,mov,ogg,qt | max:200000',
            'description'  => ['nullable'],
            'content' => ['nullable'],
            'category_id' => 'required|string',
        ];
    }
}
