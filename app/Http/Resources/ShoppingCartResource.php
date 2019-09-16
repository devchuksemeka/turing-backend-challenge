<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ShoppingCartResource extends JsonResource
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
            "cart_id"=> $this->cart_id,
            "product_id"=> $this->product_id,
            "attributes"=> $this->attributes,
            "quantity"=> $this->quantity,
            "item_id"=> $this->item_id
        ];
    }
}
