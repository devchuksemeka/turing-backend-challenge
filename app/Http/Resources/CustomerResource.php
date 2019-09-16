<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CustomerResource extends JsonResource
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
            "customer_id" => $this->customer_id,
            "name" => $this->name,
            "email" => $this->email,
            "address_1" => $this->address_1,
            "address_2" => $this->address_2,
            "city" => $this->city,
            "region" => $this->region,
            "postal_code" => $this->postal_code,
            "shipping_region_id" => $this->shipping_region_id,
            "credit_card" => $this->credit_card,
            "day_phone" => $this->day_phone,
            "eve_phone" => $this->eve_phone,
            "mob_phone" => $this->mob_phone,
        ];
    }
}
