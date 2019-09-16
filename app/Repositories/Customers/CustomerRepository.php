<?php

namespace App\Repositories\Customers;

use App\Models\Customer as Model;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class CustomerRepository implements CustomerInterface{

    protected $model;
    protected $request;

    public function __construct(Model $model, Request $request)
    {
        $this->model = $model;
        $this->request = $request;
    }

    public function create(array $attributes){
        Arr::set($attributes,"password",bcrypt(Arr::get($attributes,"password")));
        $customer = $this->model->create($attributes);
        return $this->model->find($customer->customer_id);
    }

    public function updateProfile($customer_id,array $attributes){
        $this->model->find($customer_id)->update($attributes);
        return $this->model->find($customer_id);
    }

    public function updateAddress($customer_id,array $attributes){
        $this->model->find($customer_id)->update($attributes);
        return $this->model->find($customer_id);
    }
    public function updateCreditCard($customer_id,array $attributes){
        $this->model->find($customer_id)->update($attributes);
        return $this->model->find($customer_id);
    }

    public function getSingleCustomerUsingEmail($email){
        return $this->model->where("email",$email)->first();
    }
    
    public function getAll(){
        return $this->model->all();
    }

    public function getSingle(int $id)
    {
        return $this->model->find($id);
    }

}