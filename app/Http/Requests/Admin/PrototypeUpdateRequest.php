<?php

namespace App\Http\Requests\Admin;

use App\OptionType;
use App\Taxon;
use Illuminate\Foundation\Http\FormRequest;
use Vinkla\Hashids\Facades\Hashids;

class PrototypeUpdateRequest extends FormRequest
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
            'option_types' => ['nullable', 'array'],
            'option_types.*' => [function ($attribute, $value, $fail) {
                $id = Hashids::connection(OptionType::class)->decode($value)[0] ?? null;
                if (! OptionType::where('id', $id)->exists()) {
                    return $fail(__('Some option type is not valid'));
                }
            }],
            'taxons' => ['nullable', 'array'],
            'taxons.*' => [function ($attribute, $value, $fail) {
                $id = Hashids::connection(Taxon::class)->decode($value)[0] ?? null;
                if (! Taxon::where('id', $id)->exists()) {
                    return $fail(__('Some taxon type is not valid'));
                }
            }],
        ];
    }

    public function optionTypes()
    {
        return decodeArray($this->input('option_types', []), OptionType::class);
    }

    public function taxons()
    {
        return decodeArray($this->input('taxons', []), Taxon::class);
    }
}
