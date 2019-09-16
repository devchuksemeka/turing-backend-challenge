<?php

namespace App\Services\Taxes;

use App\Enums\ErrorCodes;
use App\Http\Resources\TaxCollection;
use App\Repositories\Taxes\TaxInterface as RepoInterface;
use App\Services\Errors\ErrorServiceInterface;

class TaxService{

    protected $repository;
    protected $errorService;

    public function __construct(RepoInterface $repoInterface,
        ErrorServiceInterface $errorServiceInterface)
    {
        $this->repository = $repoInterface;
        $this->errorService = $errorServiceInterface;
    }

    public function getAll(){
        return new TaxCollection($this->repository->getAll());
    }

    public function getSingle($id){

        return $this->repository->getSingle($id);
        
    }

}