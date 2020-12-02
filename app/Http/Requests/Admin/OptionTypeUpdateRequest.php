<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class OptionTypeUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'presentation' => ['required', 'string', 'max:255'],
            'values' => ['array'],
            'values.*.name' => ['string', 'max:255'],
            'values.*.presentation' => ['string', 'max:255'],
        ];
    }

    public function messages()
    {
        return [
            'values.*.name.string' => __('Name must be string'),
            'values.*.name.max' => __('Name too long'),
            'values.*.presentation.string' => __('Display must be string'),
            'values.*.presentation.max' => __('Display too long'),
        ];
    }
}
