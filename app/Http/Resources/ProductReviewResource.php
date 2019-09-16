<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductReviewResource extends JsonResource
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
            "name"=> $this->product->name,
            "review"=> $this->review,
            "rating"=> $this->rating,
            "created_on"=> $this->created_on, 
        ];
    }
}
