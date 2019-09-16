<?php

namespace App\Services\Products;

use App\Enums\ErrorCodes;
use App\Http\Resources\ProductCollection;
use App\Http\Resources\ProductSingleResource;
use App\Repositories\Products\ProductInterface as RepoInterface;
use App\Services\Errors\ErrorServiceInterface;

class ProductService{

    protected $repository;
    protected $errorService;

    public function __construct(RepoInterface $repoInterface,
        ErrorServiceInterface $errorServiceInterface)
    {
        $this->repository = $repoInterface;
        $this->errorService = $errorServiceInterface;
    }

    public function getAll(){
        return new ProductCollection($this->repository->getAll());
    }
    
    public function getAllWithPagination(){
        return new ProductCollection($this->repository->getAllWithPagination());
    }

    public function getAllSearchWithPagination(){
        return new ProductCollection($this->repository->getAllSearchWithPagination());
    }

    public function getSingle($id){

        $data = $this->repository->getSingle($id);

        if($data) return new ProductSingleResource($data);
        
        return $this->errorService->getResponse(ErrorCodes::PRO_01);
    }

}