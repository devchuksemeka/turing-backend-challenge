<?php

namespace App\Rules;

use App\Exceptions\Users\ValueTooLongException;
use Illuminate\Contracts\Validation\Rule;

class ValueTooLong implements Rule
{
    protected $maxLength = 30;
    protected $attribute;

    public function maxLength(int $maxLength){
        $this->maxLength = $maxLength;
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
        $this->attribute = $attribute;
        if(mb_strlen($value) > $this->maxLength) return false;
        return true;
    }

    /**
     * @return array|string|void
     * @throws ValueTooLongException
     */
    public function message()
    {
        throw new ValueTooLongException($this->attribute,"This is to long < $this->attribute >",400);
    }
}
