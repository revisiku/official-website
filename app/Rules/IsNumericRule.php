<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class IsNumericRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return is_numeric($value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return app()->getLocale() === 'id'
            ? 'Input :attribute harus berupa angka.'
            : 'The :attribute must be a number.';
    }
}
