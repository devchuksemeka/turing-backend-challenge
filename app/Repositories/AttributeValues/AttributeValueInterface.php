<?php

namespace App\Repositories\AttributeValues;

interface AttributeValueInterface
{
    public function getAll();

    public function getSingle(int $id);

    public function getAllWithAttributeId(int $id);
}