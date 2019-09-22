<?php

namespace App\Services\Customers;

use App\Enums\ErrorCodes;
use App\Exceptions\Users\EmailDoesNotExistException;
use App\Exceptions\Users\InvalidEmailOrPasswordException;
use App\Http\Resources\AuthCustomerResource;
use App\Repositories\Customers\CustomerInterface;
use App\Services\Errors\ErrorServiceInterface;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;

class AppDefaultLoginService implements LoginInterface{

    protected $repository;
    protected $errorService;

    public function __construct(CustomerInterface $customerInterface,ErrorServiceInterface $errorService)
    {
        $this->repository = $customerInterface;
        $this->errorService = $errorService;
    }

    /**
     * @param array $attributes
     * @return AuthCustomerResource
     * @throws EmailDoesNotExistException
     * @throws InvalidEmailOrPasswordException
     */
    public function handleLogin(array $attributes)
    {
        $customer = $this->repository->getSingleCustomerUsingEmail(Arr::get($attributes,"email"));
        if(!$customer) throw new EmailDoesNotExistException();
        // check if password match
        if(!Hash::check(Arr::get($attributes,"password"),$customer->password)) throw new InvalidEmailOrPasswordException();
        return new AuthCustomerResource($customer);
    }

}
