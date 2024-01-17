<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCategoryRequest extends FormRequest
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
            //
            'name' =>['required', Rule::unique('categories')->ignore($this->category)]
        ];
    }
    public function messages(): array
    {
        return [
            //
            'name.required' =>'Il nome della categoria è obbligatorio',
            'name.unique'=>'Il nome esiste già'
        ];
    }
}
