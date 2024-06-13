<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
            'title' => 'required|max:150|string',
            'type_id' => 'nullable|exists:types,id',
            'description' => 'required|max:150|string',
            'repository_link' => 'required|max:500|url',
            'languages' => 'required|max:200|string',
            'softwares' => 'required|max:200|string',
            'authors' => 'required|max:200|string',
            'image_link' => 'required|max:500|url',
            'technologies' => 'exists:technologies,id'
        ];
    }
}
