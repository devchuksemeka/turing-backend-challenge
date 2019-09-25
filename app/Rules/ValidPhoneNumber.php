<?php

namespace App\Rules;

use App\Exceptions\Users\InvalidPhoneNumberException;
use Illuminate\Contracts\Validation\Rule;

class ValidPhoneNumber implements Rule
{
    protected $minLength = 9;

    protected $needsNumeric = true;

    public function minLength(int $minLength){
        $this->minLength = $minLength;
        return $this;
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
        if (mb_strlen($value) < $this->minLength) return false;
        if ($this->needsNumeric && !preg_match('/^\d+$/', $value)) return false;

        return true;
    }

    /**
     * @return array|string|void
     * @throws InvalidPhoneNumberException
     */
    public function message()
    {
        throw new InvalidPhoneNumberException();
    }
}
