<?php

namespace App\Rules;

use App\Exceptions\Users\InvalidEmailException;
use Illuminate\Contracts\Validation\Rule;

class EmailValid implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if (!preg_match('/[0-9]{1,}/', $value) ) return false;
        return true;
    }

    /**
     * @return array|string|void
     * @throws InvalidEmailException
     */
    public function message()
    {
       throw new InvalidEmailException();
    }
}
