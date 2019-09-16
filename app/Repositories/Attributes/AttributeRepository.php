<?php

namespace App\Repositories\Attributes;

use App\Models\Attribute as Model;

class AttributeRepository implements AttributeInterface{

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
}