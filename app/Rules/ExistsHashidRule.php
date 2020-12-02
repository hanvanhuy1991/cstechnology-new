<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ExistsHashidRule implements Rule
{
    protected $model;

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
        return resolve($this->model)->byHashid($value)->exists();
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The :attribute not exists.';
    }
}
