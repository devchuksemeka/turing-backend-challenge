<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;
use JWTAuth;

class AuthCustomerResource extends JsonResource
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
            "customer" => new CustomerResource($this->resource),
            "accessToken" => JWTAuth::fromUser($this->resource),
            "expiresIn" => Auth::guard()->factory()->getTTL()
        ];
    }

}
