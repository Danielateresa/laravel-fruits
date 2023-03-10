<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Exists;

class StoreFruitRequest extends FormRequest
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
            'img' => 'nullable|image|max:250',
            'name' => 'required|min:3',
            'category_id' => 'nullable|exists:categories,id',
            'weight' => 'nullable',
            'price' => 'nullable',
        ];
    }
}