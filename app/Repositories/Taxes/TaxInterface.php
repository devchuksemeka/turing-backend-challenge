<?php

namespace App\Repositories\Taxes;

interface TaxInterface
{
    public function getAll();

    public function getSingle(int $id);
}