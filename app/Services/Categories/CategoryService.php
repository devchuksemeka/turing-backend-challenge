<?php

namespace App\Services\Categories;

use App\Enums\ErrorCodes;
use App\Exceptions\Category\CategoryNotFoundException;
use App\Exceptions\Department\DepartmentIdNotNumberException;
use App\Exceptions\Department\DepartmentNotFoundException;
use App\Http\Resources\Category\Collection as CategoryCollection;
use App\Http\Resources\Category\Resource;
use App\Http\Resources\ProductCollection;
use App\Repositories\Categories\CategoryInterface as RepoInterface;
use App\Services\Errors\ErrorServiceInterface;
use Illuminate\Http\JsonResponse;

class CategoryService{

    protected $repository;
    protected $errorService;

    public function __construct(RepoInterface $repoInterface,ErrorServiceInterface $errorServiceInterface)
    {
        $this->repository = $repoInterface;
        $this->errorService = $errorServiceInterface;
    }

    public function getAll(){

        return new CategoryCollection($this->repository->getAll());
    }

    public function getSingle($id){

        $category = $this->repository->getSingle($id);

        if($category) return new Resource($category);

        throw new CategoryNotFoundException();
    }

    public function getAllCategoriesInDepartment($department_id){


        $department_id = (int)$department_id; // return 0 for non numeric values and 0 value

        if($department_id == 0) throw new DepartmentIdNotNumberException();

        $category = $this->repository->getAllCategoriesInDepartment($department_id);
        if(count($category) > 0) return new CategoryCollection($category);

        throw new DepartmentNotFoundException();
    }

    public function getAllProductsInDepartment($department_id){

        $department_id = (int)$department_id; // return 0 for non numeric values and 0 value

        if($department_id == 0) throw new DepartmentIdNotNumberException();

        $data = $this->repository->getAllProductsInDepartment($department_id);
        if(count($data) > 0) return new ProductCollection($data);

        throw new DepartmentNotFoundException();
    }

}
