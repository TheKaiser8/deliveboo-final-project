<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'name' => 'required|string|max:100',
            'is_available' => 'required|boolean',
            'image' => 'nullable|image|max:2048',
            'typology' => 'required|string|max:30',
            'description' => 'required|string|max:500',
            'ingredients' => 'required|string|max:1000',
            'price' => 'required|between:0.01,999.99|decimal:2'
        ];
    }
}
