<?php


namespace App\Services\Payments\StripePayments;


use App\Services\Payments\Interfaces\ChargingInterface;
use Illuminate\Support\Arr;
use Stripe\Charge;
use Stripe\Stripe;

class StripeCharging implements ChargingInterface
{

    public function charge(array $attributes){
        Stripe::setApiKey(StripeConstants::getSecretKey());

         $chargeObject = Charge::create([
            "amount" => Arr::get($attributes,"amount"),
            "currency" => Arr::get($attributes,"currency"),
            "source" => Arr::get($attributes,"stripeToken"),
            "description" =>Arr::get($attributes,"description"),
            "receipt_email" =>Arr::get($attributes,"receipt_email"),
            "metadata" => Arr::get($attributes,"metadata"),
            "shipping" => Arr::get($attributes,"shipping"),
        ]);

        if(Arr::get($chargeObject,"status") != "succeeded") return [
            "status" => false,
            "message" => "Charging failed try again"
        ];

        return [
            "status" => true,
            "message" => "Charged successful",
            "data" => $chargeObject,
        ];


    }
}
