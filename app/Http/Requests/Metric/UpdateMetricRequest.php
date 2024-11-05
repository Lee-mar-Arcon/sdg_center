<?php

namespace App\Http\Requests\Metric;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMetricRequest extends FormRequest
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
            'sdg_id' => 'required|numeric|exists:sdgs,id',
            'sub_category' => 'required|string|max:500|unique:metrics,sub_category,'.request()->all()['id'].',id',
        ];
    }
}
