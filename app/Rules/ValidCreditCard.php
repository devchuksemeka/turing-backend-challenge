<?php

namespace App\Rules;

use App\Exceptions\Users\InvalidCreditCardException;
use Illuminate\Contracts\Validation\Rule;

class ValidCreditCard implements Rule
{
    protected $minLength = 16;
    protected $maxLength = 16;

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
        if (mb_strlen($value) > $this->maxLength) return false;
        if ($this->needsNumeric && !preg_match('/^\d+$/', $value)) return false;

        return true;
    }

    /**
     * @return array|string|void
     * @throws InvalidCreditCardException
     */
    public function message()
    {
        throw new InvalidCreditCardException();
    }
}
