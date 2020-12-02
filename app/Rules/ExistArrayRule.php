<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ExistArrayRule implements Rule
{
    private $model;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($model)
    {
        $this->model = $model;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $decodeIds = decodeArray($value, $this->model);
        $valid = true;
        foreach ($decodeIds as $id) {
            if (! resolve($this->model)->where('id', $id)->exists()) {
                $valid = false;

                break;
            }
        }

        return $valid;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Some :attribute is not valid';
    }
}
