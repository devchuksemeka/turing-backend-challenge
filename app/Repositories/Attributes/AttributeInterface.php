<?php

namespace App\Repositories\Attributes;

interface AttributeInterface
{
    public function getAll();

    public function getSingle(int $id);
}