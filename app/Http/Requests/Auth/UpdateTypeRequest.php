<?php

namespace App\Http\Requests\Auth;
use Illuminate\Foundation\Http\FormRequest;

class UpdateTypeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'lable' => 'required|string|max:100',
            'color' => 'required|string|max:255',
        ];
    }

    /**
     * Get the error message.
     *
     * @return array<string, mixed>
     */
    public function messages()
    {
        return [
            'lable' => "L'etichetta è obbligatoria.",
            'color' => "Il colore è obbligatorio.",
        ];
    }
}