<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ShoppingCartItemResource extends JsonResource
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
            "item_id" => $this->item_id,
            "cart_id" => $this->cart_id,
            "name" => $this->product->name,
            "attributes" => $this->attributes,
            "product_id" => $this->product_id,
            "image" => $this->product->image,
            "price" => $this->product->price,
            "discounted_price" => $this->product->discounted_price,
            "quantity" => $this->quantity,
            "subtotal" => $this->subtotal,
        ];
    }
}
