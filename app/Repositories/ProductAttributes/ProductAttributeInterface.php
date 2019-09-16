<?php

namespace App\Repositories\ProductAttributes;

interface ProductAttributeInterface
{
    public function getAll();

    public function getSingle(int $id);

    public function getAllAttributesOfAProduct(int $id);
}