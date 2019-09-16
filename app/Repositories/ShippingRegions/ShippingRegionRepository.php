<?php

namespace App\Repositories\ShippingRegions;

use App\Models\ShippingRegion as Model;

class ShippingRegionRepository implements ShippingRegionInterface{

    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }
    
    public function getAll(){
        return $this->model->all();
    }
}