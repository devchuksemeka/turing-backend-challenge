<?php

namespace App\Services\Customers;

use App\Enums\ErrorCodes;
use App\Enums\LoginType;
use App\Http\Resources\AuthCustomerResource;
use App\Http\Resources\CustomerResource;
use App\Models\Customer;
use App\Repositories\Customers\CustomerInterface as RepoInterface;
use App\Services\Errors\ErrorServiceInterface;

class CustomerService{

    protected $repository;
    protected $errorService;

    public function __construct(RepoInterface $repoInterface,
        ErrorServiceInterface $errorServiceInterface)
    {
        $this->repository = $repoInterface;
        $this->errorService = $errorServiceInterface;
    }

    public function getAll(){

        return new CategoryCollection($this->repository->getAll());
    }

    public function getSingle($id){

        $category = $this->repository->getSingle($id);

        if($category) return new Resource($category);
        
        return $this->errorService->getResponse(ErrorCodes::CAT_01);
    }

    public function create(array $attributes){
        return new AuthCustomerResource($this->repository->create($attributes));
    }

    public function login(array $attributes,$login_type="app_default"){
        
        if($login_type == LoginType::FACEBOOK) app()->bind(LoginInterface::class,FacebookLoginService::class);
        else  app()->bind(LoginInterface::class,AppDefaultLoginService::class);
        
        $loginInterface = app()->make(LoginInterface::class);
        return $loginInterface->handleLogin($attributes);
        
    }

    public function getCustomerProfile(Customer $customer){
        return new CustomerResource($customer);   
    }

    public function updateCustomerProfile(Customer $customer,array $attributes){
        return new CustomerResource($this->repository->updateProfile($customer->customer_id,$attributes));   
    }

    public function updateCustomerAddress(Customer $customer,array $attributes){
        return new CustomerResource($this->repository->updateAddress($customer->customer_id,$attributes));   
    }

    public function updateCustomerCreditCard(Customer $customer,array $attributes){
        return new CustomerResource($this->repository->updateCreditCard($customer->customer_id,$attributes));   
    }

}