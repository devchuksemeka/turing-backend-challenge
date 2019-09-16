<?php

namespace App\Repositories\AttributeValues;

use App\Models\AttributeValue as Model;

class AttributeValueRepository implements AttributeValueInterface{

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

    public function getAllWithAttributeId(int $id)
    {
        return $this->model->where("attribute_id",$id)->get();
    }
}