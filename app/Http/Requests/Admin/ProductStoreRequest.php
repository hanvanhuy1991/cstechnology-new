<?php

namespace App\Http\Requests\Admin;

use App\Enums\ProductStatus;
use App\OptionType;
use App\OptionValue;
use App\Prototype;
use App\Rules\ExistArrayRule;
use App\Rules\ExistsHashidRule;
use App\Taxon;
use BenSampo\Enum\Rules\EnumValue;
use Illuminate\Foundation\Http\FormRequest;

class ProductStoreRequest extends FormRequest
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
            'status' => ['required', new EnumValue(ProductStatus::class, false)],
            'name' => ['required', 'string', 'max:255'],
            'price' => ['required', 'numeric', 'min:0'],
            'sku' => ['nullable', 'unique:variants,sku', 'max:255'],
            'available_on' => ['nullable'],
            'prototype_id' => ['nullable', new ExistsHashidRule(Prototype::class)],
            'option_types' => ['sometimes', 'required_with:option_values_hash', 'array', new ExistArrayRule(OptionType::class)],
            'option_values_hash.*' => ['sometimes', 'required_with:option_types', 'array', new ExistArrayRule(OptionValue::class)],
        ];
    }

    public function optionTypes()
    {
        return decodeArray($this->input('option_types', []), OptionType::class);
    }

    public function combineVariations()
    {
        $optionValues = [];
        foreach ($this->input('option_values_hash', []) as $option => $values) {
            $optionValues[decode($option, OptionType::class)] = decodeArray($values, OptionValue::class);
        }
        if (count($optionValues) == 0) {
            return [];
        }

        return getCombinations($optionValues);
    }

    public function prototype()
    {
        return decode($this->input('prototype_id'), Prototype::class);
    }

    public function taxons()
    {
        return Taxon::whereHas('prototypes', function ($q) {
            $q->whereId($this->prototype());
        })->pluck('id')->toArray();
    }
}
