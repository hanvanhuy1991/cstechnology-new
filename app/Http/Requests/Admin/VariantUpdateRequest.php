<?php

namespace App\Http\Requests\Admin;

use App\OptionValue;
use App\Rules\ExistArrayRule;
use App\Rules\ExistsHashidRule;
use App\Variant;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class VariantUpdateRequest extends FormRequest
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
            'sku' => ['required', 'string', 'max:255', Rule::unique('variants')->ignore($this->route('variant')->id)],
            'option_values.*' => ['required', new ExistsHashidRule(OptionValue::class)],
            'price' => ['required', 'numeric', 'min:0'],
            'cost_price' => ['nullable', 'numeric', 'min:0'],
            'weight' => ['nullable', 'numeric', 'min:0'],
            'height' => ['nullable', 'numeric', 'min:0'],
            'width' => ['nullable', 'numeric', 'min:0'],
            'depth' => ['nullable', 'numeric', 'min:0'],
        ];
    }

    public function optionValues()
    {
        return decodeArray($this->input('option_values'), OptionValue::class);
    }

    /**
     * Configure the validator instance.
     *
     * @param  \Illuminate\Validation\Validator  $validator
     * @return void
     */
    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            $productId = $this->route('product')->id;
            $variant = Variant::query()
                        ->where('id', '<>', $this->route('variant')->id)
                        ->whereHas('product', function ($q) use ($productId) {
                            $q->whereId($productId);
                        });
            foreach ($this->optionValues() as $optionValueId) {
                $variant->whereHas('optionValues', function ($q) use ($optionValueId) {
                    $q->where('option_value_id', $optionValueId);
                });
            }

            if ($variant->exists()) {
                $validator->errors()->add('option_values', __('Option values combine is exists in another variant'));
            }
        });
    }
}
