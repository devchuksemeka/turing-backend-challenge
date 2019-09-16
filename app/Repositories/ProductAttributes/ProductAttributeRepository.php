<?php

namespace App\Repositories\ProductAttributes;

use App\Models\ProductAttribute as Model;

class ProductAttributeRepository implements ProductAttributeInterface{

    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }
    
    public function getAll(){
        return $this->model->all();
    }
    
    public function getSingle(int $id)
    {
        return $this->model->find($id);
    }

    public function getAllAttributesOfAProduct(int $id)
    {
        return $this->model->where("product_id",$id)->get();
    }
}