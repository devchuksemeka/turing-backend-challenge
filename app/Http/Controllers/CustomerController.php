<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCustomerRequest;
use App\Http\Requests\LoginInputRequest;
use App\Http\Requests\UpdateCustomerAddressRequest;
use App\Http\Requests\UpdateCustomerProfileRequest;
use App\Models\Customer;
use App\Services\Customers\CustomerService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Customer controller handles all requests that has to do with customer
 * Some methods needs to be implemented from scratch while others may contain one or two bugs.
 *
 *  NB: Check the BACKEND CHALLENGE TEMPLATE DOCUMENTATION in the readme of this repository to see our recommended
 *  endpoints, request body/param, and response object for each of these method
 *
 * Class CustomerController
 * @package App\Http\Controllers
 */
class CustomerController extends Controller
{
    protected $service;

    public function __construct(CustomerService $customerService)
    {
        $this->service = $customerService;
    }

    /**
     * Allow customers to create a new account.
     *
     * @param CreateCustomerRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(CreateCustomerRequest $request)
    {
        return $this->service->create($request->validated());
    }

    /**
     * Allow customers to login to their account.
     *
     * @param App\Http\Requests\LoginInputRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(LoginInputRequest $request)
    {
        return $this->service->login($request->validated());
    }

    /**
     * Allow customers to view their profile info.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getCustomerProfile()
    {
        return $this->service->getCustomerProfile(Auth::user());
    }

    /**
     * Allow customers to update their profile info like name, email, password, day_phone, eve_phone and mob_phone.
     *
     * @param UpdateCustomerProfileRequest $request
     * @return \App\Http\Resources\CustomerResource
     */
    public function updateCustomerProfile(UpdateCustomerProfileRequest $request)
    {
        return $this->service->updateCustomerProfile(Auth::user(),$request->validated());
    }

    /**
     * Allow customers to update their address info/
     *
     * @param UpdateCustomerAddressRequest $request
     * @return \App\Http\Resources\CustomerResource
     */
    public function updateCustomerAddress(UpdateCustomerAddressRequest $request)
    {
        return $this->service->updateCustomerAddress(Auth::user(),$request->validated());
    }

    /**
     * Allow customers to update their credit card number.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateCreditCard()
    {
        return response()->json(['message' => 'this works']);
    }

    /**
     * Apply something to customer.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function apply()
    {
        return response()->json(['message' => 'this works']);
    }


}
