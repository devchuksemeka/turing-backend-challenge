<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderShortDetailResource extends JsonResource
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
            "order_id" => $this->order_id,
            "total_amount" => $this->total_amount,
            "created_on" => $this->created_on,
            "shipped_on" => $this->shipped_on,
            "status" => $this->status,
            "name" => $this->customer->name,
        ];
    }
}
