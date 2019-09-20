<?php

namespace App\Repositories\OrderDetails;

use App\Models\OrderDetail as Model;

class OrderDetailRepository implements OrderDetailInterface{

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
