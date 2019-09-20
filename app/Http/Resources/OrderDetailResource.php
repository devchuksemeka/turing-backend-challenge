<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderDetailResource extends JsonResource
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
            "product_id"=> $this->product_id,
            "attributes"=> $this->attributes,
            "product_name"=> $this->product_name,
            "quantity"=> $this->quantity,
            "unit_cost"=> $this->unit_cost,
            "subtotal"=> $this->subtotal
        ];
    }
}
