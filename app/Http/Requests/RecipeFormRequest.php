<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RecipeFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'recipe_name' => 'required',
            'slug' => 'required',
            'description' => 'required',
            'small_details' => 'required',
            'avg_cooking_time' => 'required',
            'ingredients' => 'required',
            'tools_needed' => 'required',
            'procedures' => 'required',
            'is_active' => 'sometimes',
        ];
    }
}
