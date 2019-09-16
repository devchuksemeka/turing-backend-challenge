<?php

namespace App\Services\Customers;

use App\Enums\ErrorCodes;
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

    public function handleLogin(array $attributes)
    {
        $customer = $this->repository->getSingleCustomerUsingEmail(Arr::get($attributes,"email"));
        if(!$customer) return $this->errorService->getResponse(ErrorCodes::USR_05);
        // check if password match
        if(!Hash::check(Arr::get($attributes,"password"),$customer->password)) return $this->errorService->getResponse(ErrorCodes::USR_01);
        return new AuthCustomerResource($customer);
    }

}