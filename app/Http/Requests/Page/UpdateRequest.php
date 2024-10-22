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
            'description'  => ['nullable'],
            'text_right'  => ['nullable'],
            'text_left'  => ['nullable'],
            'video_preview' => 'mimetypes:video/x-ms-asf,video/x-flv,video/mp4,application/x-mpegURL,video/MP2T,video/3gpp,video/quicktime,video/x-msvideo,video/x-ms-wmv,video/avi,video/webm| max:200000',
            'video_in_player' => 'mimetypes:video/x-ms-asf,video/x-flv,video/mp4,application/x-mpegURL,video/MP2T,video/3gpp,video/quicktime,video/x-msvideo,video/x-ms-wmv,video/avi,video/webm| max:200000',
        ];
        return [
          'title.required' => 'Поле Название должно быть заполнено',
          'title.max' => 'Поле Название должно содержать не более :max символов',
          'video_preview.required' => 'Поле Видео должно быть заполнено',
          'video_preview.file' => 'Поле Видео должно быть файлом',
          'video_preview.max' => 'Поле Видео должно быть не более 200 Мбайт',
          'video_preview.mimes' => 'Поле Видео должно быть одного из следующих типов: :values',
          'video_in_player.required' => 'Поле Видео в плеере должно быть заполнено',
          'video_in_player.file' => 'Поле Видео в плеере должно быть файлом',
          'video_in_player.max' => 'Поле Видео в плеере должно быть не более 200 Мбайт',
          'video_in_player.mimes' => 'Поле Видео в плеере должно быть одного из следующих типов: :values',
      ];
    }
}
