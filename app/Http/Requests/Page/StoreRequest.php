<?php

namespace App\Http\Requests\Page;

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
            'h1_title'=> ['required', 'max:70'],
            'dashboard_title'=> ['required', 'max:70'],
            'slug' => ['required', 'max:70'],
            'description'  => ['nullable'],
            'description_footer'  => ['nullable'],
            'image' => 'nullable|image'
        ];
    }
}
