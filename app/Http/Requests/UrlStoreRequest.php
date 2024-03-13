<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UrlStoreRequest extends FormRequest
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
            'orginalUrl' => 'required|string|max:255',
            //'short_url' => 'required|string|max:6|unique:url'
        ];
    }

    public function messages(): array
    {
        return [
            'orginalUrl.required' => 'Privalote įvesti nuorodą',
            'orginalUrl.string' => 'Nuoroda privalo būti tekstinė',
            'orginalUrl.max' => 'Nuoroda negali būti ilgesnė nei 255 simboliai',
        ];
    }
}
