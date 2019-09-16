<?php

namespace App\Repositories\Products;

interface ProductInterface
{
    public function getAll();

    public function getAllWithPagination();

    public function getAllSearchWithPagination();

    public function getSingle(int $id);
    
    public function getSingleProductCategory(int $id);
}