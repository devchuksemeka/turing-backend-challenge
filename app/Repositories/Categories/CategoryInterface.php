<?php

namespace App\Repositories\Categories;

interface CategoryInterface
{
    public function getAll();

    public function getSingle(int $id);

    public function getAllCategoriesInDepartment($department_id);

    public function getAllProductsInDepartment($department_id);


}