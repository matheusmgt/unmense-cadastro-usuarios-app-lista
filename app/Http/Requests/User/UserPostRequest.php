<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UserPostRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'telefone' => 'max:25',
            'genre_film' => 'max:50',
            'genre_music' => 'max:50',
            'genre_sport' => 'max:50',
            'description' => 'max:200'
        ];
    }

}
