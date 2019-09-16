<?php

namespace App\Services\ShippingRegions;

use App\Http\Resources\ShippingRegionCollection;
use App\Repositories\ShippingRegions\ShippingRegionInterface as RepoInterface;
use App\Services\Errors\ErrorServiceInterface;

class ShippingRegionService{

    protected $repository;
    protected $errorService;

    public function __construct(RepoInterface $repoInterface,
        ErrorServiceInterface $errorServiceInterface)
    {
        $this->repository = $repoInterface;
        $this->errorService = $errorServiceInterface;
    }

    public function getAll(){
        return new ShippingRegionCollection($this->repository->getAll());
    }

}