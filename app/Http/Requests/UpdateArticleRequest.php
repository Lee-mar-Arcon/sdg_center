<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateArticleRequest extends FormRequest
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
            'title' => 'required|string|max:1000|unique:articles,title,'.request()->all()['id'].',id',
            'author' => 'required|string|max:255',
            'event_date' => 'required|date',
            'categories' => 'required|array',
            'categories.*' => 'numeric|exists:categories,id',
            'sdgs' => 'required|array',
            'sdgs.*' => 'numeric|exists:sdgs,id',
            'images' => "nullable|array",
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'content' => 'required|string'
        ];
    }
}
