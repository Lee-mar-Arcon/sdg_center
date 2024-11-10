<?php

namespace App\Http\Requests\Article;

use Illuminate\Foundation\Http\FormRequest;

class StoreArticleRequest extends FormRequest
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
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240', // Adjust max size as needed
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'author' => 'required|string|max:255',
            'short_description' => 'nullable|string|max:500',
            'content' => 'required|string',
            'event_date' => 'nullable|date_format:Y-m-d H:i:s', // Adjust event date format if needed
        ];
    }

    public function messages()
    {
        return [
            'photo.required' => 'required',
            'photo.mimes' => 'must be png/jpg',
            'title.required' => 'required',
            'title.string' => 'invalid data',
            'title.min' => 'must be at least 3 characters',
            'title.max' => 'must be below 255 characters',
            'category_id.required' => 'required',
            'category_id.numeric' => 'invalid data',
            'author.string' => 'invalid data',
            'author.min' => 'must be at least 3 characters',
            'author.max' => 'must be below 255 characters',
            'short_description.string' => 'invalid data',
            'short_description.min' => 'must be at least 5 characters',
            'short_description.max' => 'must be below 100 characters',
            'content.required' => 'required',
            'content.string' => 'Invalid Data', // changed 'text' to 'string'
            'content.min' => 'must be at least 5 characters',
            'event_date.required' => 'required',
        ];
    }
}
