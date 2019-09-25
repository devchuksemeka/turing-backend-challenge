<?php


namespace App\Services\Payments\Interfaces;


interface ChargingInterface
{
    public function charge(array $attribute);
}
