<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ProductCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'row' => ProductResource::collection($this->collection),
            'paginationMeta' => [
                'totalRecords' => $this->total(),
                'currentPageSize' => $this->perPage(),
                'currentPage' => $this->currentPage(),
                'totalPages' => $this->lastPage(),
            ]
        ];
    }  

    public function toResponse($request)
    {
        return JsonResource::toResponse($request);
    }
}
