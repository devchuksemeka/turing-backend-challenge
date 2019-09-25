<?php


namespace App\Services\Payments\StripePayments;


class StripeConstants
{
    public static function getSecretKey(){
        return env("STRIPE_KEY");
    }
}
