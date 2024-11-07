<?php

namespace App\Http\Requests\Indicator;

use Illuminate\Foundation\Http\FormRequest;

class StoreIndicatorRequest extends FormRequest
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
            'metric_id' => 'required|numeric|exists:metrics,id',
            'indicator' => 'required|string|unique:indicators,indicator|max:1000',
            'applied' => 'required|string|',
            'evidence_1' => 'required|mimes:pdf',
            'evidence_2' => 'nullable|mimes:pdf',
        ];
    }
}
