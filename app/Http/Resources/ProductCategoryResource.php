<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductCategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            "category_id"=>$this->category_id,   
            "department_id"=>$this->category->department_id,   
            "name"=> $this->category->name,   
        ];
    }
}
