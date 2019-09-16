<?php

namespace App\Services\ProductCategories;

use App\Http\Resources\ProductCategoryResource;
use App\Http\Resources\ProductCollection;
use App\Repositories\ProductCategories\ProductCategoryInterface as RepositoryInterface;
use App\Services\Errors\ErrorServiceInterface;

class ProductCategoryService{

    protected $repository;
    protected $errorService;

    public function __construct(RepositoryInterface $repository,ErrorServiceInterface $errorServiceInterface)
    {
        $this->repository = $repository;
        $this->errorService = $errorServiceInterface;
    }

    public function getSingleWithProduct($id){
        
        $repository = $this->repository->getSingleWithProduct($id);
        return new ProductCategoryResource($repository);
    }
    public function getAllProductsInCategory($category_id){
        $repository = $this->repository->getAllProductsInCategory($category_id);
        return new ProductCollection($repository);
    }

}