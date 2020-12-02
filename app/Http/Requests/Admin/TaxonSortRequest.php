<?php

namespace App\Http\Requests\Admin;

use App\Taxon;
use Illuminate\Foundation\Http\FormRequest;

class TaxonSortRequest extends FormRequest
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
            'parent_id' => ['required'],
            'position' => ['required', 'integer'],
        ];
    }

    public function parentId()
    {
        return decode($this->input('parent_id'), Taxon::class);
    }
}
