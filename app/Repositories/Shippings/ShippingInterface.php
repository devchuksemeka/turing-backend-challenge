<?php

namespace App\Repositories\Shippings;

interface ShippingInterface
{
    public function getAllShippingInRegion($region_id);
}