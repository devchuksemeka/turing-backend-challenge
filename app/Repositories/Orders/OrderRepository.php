<?php

namespace App\Repositories\Orders;

use App\Exceptions\Orders\InvalidOrderIdException;
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

    public function getCustomerOrders(int $customer_id)
    {
        return $this->model->where("customer_id",$customer_id)->get();
    }

    /**
     * @param int $order_id
     * @param array $attributes
     * @return bool
     * @throws InvalidOrderIdException
     */
    public function updateOrder(int $order_id, array $attributes): bool
    {
        $single = $this->getSingle($order_id);
        if(!$single) throw new InvalidOrderIdException();
        return $single->update($attributes);
    }
}
