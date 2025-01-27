<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Autorizza tutte le richieste
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
        ];
    }
}
