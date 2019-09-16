<?php

namespace App\Repositories\Taxes;

use App\Models\Tax as Model;

class TaxRepository implements TaxInterface{

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