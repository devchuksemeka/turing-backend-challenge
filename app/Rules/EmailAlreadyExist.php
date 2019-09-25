<?php

namespace App\Rules;

use App\Exceptions\Users\EmailAlreadyExistException;
use App\Models\Customer;
use App\Repositories\Customers\CustomerInterface;
use App\Repositories\Customers\CustomerRepository;
use Illuminate\Contracts\Validation\Rule;

class EmailAlreadyExist implements Rule
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
        $customerExist = Customer::where("email",$value);
        if($customerExist) return false;
        return true;
    }

    /**
     * @return array|string|void
     * @throws EmailAlreadyExistException
     */
    public function message()
    {
        throw new EmailAlreadyExistException();
    }
}
