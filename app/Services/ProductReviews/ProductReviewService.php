<?php

namespace App\Services\ProductReviews;

use App\Enums\ErrorCodes;
use App\Http\Resources\Category\Collection as CategoryCollection;
use App\Http\Resources\Category\Resource;
use App\Http\Resources\ProductCollection;
use App\Http\Resources\ProductReviewCollection;
use App\Http\Resources\ProductReviewResource;
use App\Repositories\ProductReviews\ProductReviewInterface as RepoInterface;
use App\Services\Errors\ErrorServiceInterface;
use Illuminate\Http\JsonResponse;

class ProductReviewService{

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

    public function getAllReviewsInProduct($product_id){

        $category = $this->repository->getAllReviewsInProduct($product_id);
        return new ProductReviewCollection($category);
    }

    public function create(array $attributes){
        return new ProductReviewResource($this->repository->create($attributes));
    }

    

}