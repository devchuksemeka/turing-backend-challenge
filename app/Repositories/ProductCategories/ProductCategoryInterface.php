<?php

namespace App\Repositories\ProductCategories;

interface ProductCategoryInterface
{
    public function getAll();

    public function getSingleWithProduct(int $id);

    public function getAllProductsInCategory(int $category_id);
    
}