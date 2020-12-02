<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class TaxonUpdateRequest extends FormRequest
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
            'name' => 'sometimes|string|max:255',
            'slug' => 'sometimes|alpha_dash|max:255',
            'meta_title' => 'sometimes|string|max:255',
            'meta_description' => 'sometimes|string|max:255',
            'meta_keywords' => 'sometimes|string|max:255',
        ];
    }
}
