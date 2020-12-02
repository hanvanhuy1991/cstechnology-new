<?php

namespace App\Http\Requests\Admin;

use App\Enums\ProductStatus;
use App\Enums\PromotionableType;
use App\Rules\ExistArrayRule;
use App\Taxon;
use BenSampo\Enum\Rules\EnumValue;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductUpdateRequest extends FormRequest
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
        $masterVariant = $this->route('product')->variantMaster;

        return [
            'status' => ['required', new EnumValue(ProductStatus::class, false)],
            'name' => ['required', 'string', 'max:255'],
            'price' => ['required', 'numeric', 'min:0'],
            'cost_price' => ['nullable', 'numeric', 'min:0'],
            'available_on' => ['nullable','date_format:Y-m-d H:i'],
            'discontinue_on' => ['nullable', 'date_format:Y-m-d H:i'],
            'promotionable' => ['required', new EnumValue(PromotionableType::class, false)],
            'sku' => ['nullable', 'max:255', Rule::unique('variants')->ignore($masterVariant->id)],
            'meta_title' => ['nullable', 'string', 'max:255'],
            'meta_description' => ['nullable', 'string', 'max:255'],
            'meta_keywords' => ['nullable', 'string', 'max:255'],
            'images' => ['sometimes', 'array'],
            'taxons' => ['sometimes', 'array', new ExistArrayRule(Taxon::class)],
        ];
    }

    public function taxons()
    {
        return decodeArray($this->input('taxons', []), Taxon::class);
    }
}
