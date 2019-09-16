<?php

namespace App\Repositories\Orders;

use App\Models\Order as Model;

class OrderRepository implements OrderInterface{

    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }
    
    public function getAll(){
        return $this->model->all();
    }

    public function create(array $attribute)
    {
        return $this->model->create($attribute);
    }
    
    public function getSingle(int $id)
    {
        return $this->model->find($id);
    }

    public function getOrderSummaryUsingOrderId($order_id)
    {
        return $this->model->find($order_id);
    }
}