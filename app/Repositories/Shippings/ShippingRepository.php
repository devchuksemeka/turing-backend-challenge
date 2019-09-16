<?php

namespace App\Repositories\Shippings;

use App\Models\Shipping as Model;

class ShippingRepository implements ShippingInterface{

    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }
    
    public function getAllShippingInRegion($region_id){
        return $this->model->where("shipping_region_id",$region_id)->get();
    }
}