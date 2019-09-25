<?php

namespace App\Repositories\Orders;

interface OrderInterface
{
    public function getAll();

    public function getSingle(int $id);

    public function create(array $attribute);

    public function getOrderSummaryUsingOrderId($order_id);

    public function getCustomerOrders(int $customer_id);

    public function updateOrder(int $order_id,array $attributes):bool;
}
