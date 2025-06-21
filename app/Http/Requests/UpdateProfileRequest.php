<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . auth()->id(),
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // 2MB max
        ];
    }

    public function messages()
    {
        return [
            'avatar.image' => 'O arquivo deve ser uma imagem',
            'avatar.mimes' => 'Formatos permitidos: jpeg, png, jpg, gif',
            'avatar.max' => 'O tamanho máximo da imagem é 2MB',
        ];
    }
}