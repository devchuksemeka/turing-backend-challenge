<?php

namespace App\Repositories\OrderDetails;

interface OrderDetailInterface
{
    public function getAll();

    public function getSingle(int $id);

    public function create(array $attribute);

    public function getOrderSummaryUsingOrderId($order_id);
}
