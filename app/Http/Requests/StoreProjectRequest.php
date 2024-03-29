<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title'=> 'required|max:255|unique:projects,title',
            'description'=> 'required|max:3000',
            'link'=> 'required|max:255|url|unique:projects,link',
            'preview'=> 'required|max:255|url',
            'img'=> 'required|max:2048|image',
            'type_id'=> 'nullable|exists:types,id'
        ];
    }
}
