<?php

namespace App\Rules;

use App\Exceptions\Users\ShippingRegionIdNotNumberException;
use Illuminate\Contracts\Validation\Rule;

class ShippingRegionIdIsNumber implements Rule
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
        if (!preg_match('/^\d+$/', $value)) return false;
        return true;
    }

    /**
     * @return array|string|void
     * @throws ShippingRegionIdNotNumberException
     */
    public function message()
    {
        throw new ShippingRegionIdNotNumberException();
    }
}
