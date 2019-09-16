<?php

namespace App\Repositories\Customers;

interface CustomerInterface
{
    public function getAll();

    public function getSingle(int $id);

    public function create(array $attributes);

    public function updateProfile($customer_id,array $attributes);

    public function updateAddress($customer_id,array $attributes);

    public function updateCreditCard($customer_id,array $attributes);

    public function getSingleCustomerUsingEmail($email);


}