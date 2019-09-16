<?php

namespace App\Services\Categories;

use App\Enums\ErrorCodes;
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
        
        return $this->errorService->getResponse(ErrorCodes::CAT_01);
    }

    public function getAllCategoriesInDepartment($department_id){


        $department_id = (int)$department_id; // return 0 for non numeric values and 0 value
        
        if($department_id == 0) return $this->errorService->getResponse(ErrorCodes::DEP_01);

        $category = $this->repository->getAllCategoriesInDepartment($department_id);
        if(count($category) > 0) return new CategoryCollection($category);

        return $this->errorService->getResponse(ErrorCodes::DEP_02);
    }

    public function getAllProductsInDepartment($department_id){

        $department_id = (int)$department_id; // return 0 for non numeric values and 0 value
        
        if($department_id == 0) return $this->errorService->getResponse(ErrorCodes::DEP_01);

        $data = $this->repository->getAllProductsInDepartment($department_id);
        if(count($data) > 0) return new ProductCollection($data);

        return $this->errorService->getResponse(ErrorCodes::DEP_02);
    }

}