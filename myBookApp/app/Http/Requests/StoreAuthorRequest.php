<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAuthorRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'birthdate' => 'nullable|date|before:today', // Assicurati di usare 'birthdate'
        ];
    }
}
