<?php

namespace App\Http\Requests\Page;

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
            'slug' => ['required', 'max:70'],
            'description'  => ['nullable'],
            'text_right'  => ['nullable'],
            'text_left'  => ['nullable'],
            'video_preview' => 'mimetypes:video/avi,video/mpeg,video/quicktime | max:200000',
            'video_in_player' => 'mimetypes:video/avi,video/mpeg,video/quicktime | max:200000',
        ];
    }
}
