<?php

namespace App\Http\Requests\SDG;

use Illuminate\Foundation\Http\FormRequest;

class StoreSDGRequest extends FormRequest
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
            'name' => 'required|string|min:5|max:255|unique:sdgs,name',
            'description' => "string|required|min:10|max:500",
            'icon' => 'required|mimes:png,jpg',
            'sdg_no' => "required|numeric|unique:sdgs,sdg_no",
            'bg_color' => "required|string",
        ];
    }

    function messages(){
        return [
            'bg_color.required' => 'required',
            'bg_color.string' => 'invalid data',
            'sdg_no.required' => 'required',
            'sdg_no.numeric' => 'must be a number',
            'sdg_no.unique' => 'already exists',
            'name.required' => 'required',
            'name.string' => 'wrong input',
            'name.min' => 'must be at least 5 characters',
            'name.max' => 'must be 255 characters below',
            'name.unique' => 'already exists',
            'description.required' => 'required',
            'description.string' => 'wrong input',
            'description.min' => 'must be at least 10 characters',  
            'description.max' => 'must be 500 characters below',
            'icon.required' => 'required',
            'icon.mimes' => 'must be png/jpg',
        ];
    }
}
