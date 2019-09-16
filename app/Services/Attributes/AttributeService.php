<?php

namespace App\Services\Attributes;

use App\Enums\ErrorCodes;
use App\Http\Resources\AttributeCollection;
use App\Http\Resources\AttributeResource;
use App\Http\Resources\AttributeValueCollection;
use App\Http\Resources\ProductAttributeResource;
use App\Repositories\Attributes\AttributeInterface as RepoInterface;
use App\Repositories\AttributeValues\AttributeValueInterface;
use App\Repositories\ProductAttributes\ProductAttributeInterface;
use App\Services\Errors\ErrorServiceInterface;

class AttributeService{

    protected $repository;
    protected $attributeValueRepo;
    protected $productAttributeRepo;
    protected $errorService;

    public function __construct(RepoInterface $repoInterface,
        ErrorServiceInterface $errorServiceInterface,
        AttributeValueInterface $attributeValueInterface,
        ProductAttributeInterface $productAttributeInterface)
    {
        $this->repository = $repoInterface;
        $this->attributeValueRepo = $attributeValueInterface;
        $this->productAttributeRepo = $productAttributeInterface;
        $this->errorService = $errorServiceInterface;
    }

    public function getAll(){
        return new AttributeCollection($this->repository->getAll());
    }

    public function getSingle($id){

        $data = $this->repository->getSingle($id);

        if($data) return new AttributeResource($data);
        
        return $this->errorService->getResponse(ErrorCodes::CAT_01);
    }

    public function getAllAttributesValueInAttribute($attribute_id){

        $data = $this->attributeValueRepo->getAllWithAttributeId($attribute_id);
        if(count($data) > 0) return new AttributeValueCollection($data);

        return $this->errorService->getResponse(ErrorCodes::ATTR_01);
    }

    public function getAllAttributesOfSingleProduct($product_id){

        $data = $this->productAttributeRepo->getAllAttributesOfAProduct($product_id);
        return ProductAttributeResource::collection($data);
        // if(count($data) > 0) return ProductAttributeResource::collection($data);

        // return $this->errorService->getResponse(ErrorCodes::ATTR_01);
    }

}