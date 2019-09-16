<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductSingleResource extends JsonResource
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
            "name"=> $this->name,
            "description" => $this->description,
            "price"=> $this->price,
            "discounted_price" => $this->discounted_price,
            "thumbnail" => $this->thumbnail,
            "image"=> $this->image,
            "image_2"=> $this->image_2,
            "displayl"=> $this->display,
        ];
    }
}
