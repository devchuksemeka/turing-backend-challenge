<?php

namespace App\Services\Shippings;

use App\Repositories\Shippings\ShippingInterface as RepoInterface;
use App\Services\Errors\ErrorServiceInterface;

class ShippingService{

    protected $repository;
    protected $errorService;

    public function __construct(RepoInterface $repoInterface,
        ErrorServiceInterface $errorServiceInterface)
    {
        $this->repository = $repoInterface;
        $this->errorService = $errorServiceInterface;
    }

    public function getAllShippingInRegion($region_id){
        return $this->repository->getAllShippingInRegion($region_id);
    }

}