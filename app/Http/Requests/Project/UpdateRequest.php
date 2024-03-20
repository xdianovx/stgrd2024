<?php

namespace App\Http\Requests\Project;

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
          'poster' => 'nullable|image|max:10000',
          'text' => ['required'],
          'text_card' => ['required'],
          'link' => ['required', 'max:70'],
          'link_title' => ['required', 'max:70'],
          "presentation" => "nullable|mimes:pdf|max:10000",

          'address' => ['required', 'max:70'],
          'flats' => ['required', 'max:70'],
          'deadline' => ['required', 'max:70'],
          'interior' => ['required', 'max:70'],
          'floors' => ['required', 'max:70'],
          'corpuses' => ['required', 'max:70'],

          'city_id' => 'required|string',
          'status_id' => 'required|string',
        ];
    }
}
