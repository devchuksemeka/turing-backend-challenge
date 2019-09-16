<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductAttributeResource extends JsonResource
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
            "attribute_name" => $this->attributeValue->attribute->name,
            "attribute_value_id" => $this->attribute_value_id,
            "attribute_value" => $this->attributeValue->value,
        ];
    }
}
