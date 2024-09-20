<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class PropertyFormRequest extends FormRequest
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
            "title" => ["required", "min:8"],
            "description" => ["required", "min:8"],
            "surfaces" => ["required", "integer", "min:10"],
            "rooms" => ["required", "integer", "min:1"],
            "bedrooms" => ["required", "integer", "min:0"],
            "floor" => ["required", "integer", "min:0"],
            "price" => ["required", "integer", "min:0"],
            "city" => ["required", "min:0"],
            "adress" => ["required", "min:2"],
            "postal_code" => ["required", "integer"],
            "sold" => ["required", "boolean"],
            "options" => ["required", "array", "exists:options,id"],
            'image1' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image2' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image3' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }
}

