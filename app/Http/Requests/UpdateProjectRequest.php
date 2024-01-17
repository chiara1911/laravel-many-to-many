<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProjectRequest extends FormRequest
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
            'title'=>['required', 'min:3', 'max:200', Rule::unique('projects')->ignore($this->project)],
            'description'=>['nullable'],
            'link'=> ['nullable', 'url'],
            'image'=>['required'],
            'category_id'=> ['nullable', 'exists:categories,id']
        ];
    }
    public function messages(): array
    {
        return [
            //

            'title.required' => 'Il titolo è obbligatorio',
            'title.min'=> 'Il titolo deve contenere almeno :min caratteri',
            'title.max'=> 'Il titolo deve avere massimo :max caratteri',
            'title.unique' => 'Questo titolo esiste già',
            'link.url'=> 'Il link deve contenere un\'url',
            'image.required'=> 'L\' immagine è obbligatoria'

        ];
    }
}
