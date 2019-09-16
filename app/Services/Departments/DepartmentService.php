<?php

namespace App\Services\Departments;

use App\Enums\ErrorCodes;
use App\Http\Resources\DepartmentResource;
use App\Repositories\Departments\DepartmentInterface;
use App\Services\Errors\ErrorServiceInterface;

class DepartmentService{

    protected $department;
    protected $errorService;

    public function __construct(DepartmentInterface $departmentInterface,ErrorServiceInterface $errorServiceInterface)
    {
        $this->department = $departmentInterface;
        $this->errorService = $errorServiceInterface;
    }

    public function getSingleDepartment($department_id){

        $department_id = (int)$department_id; // return 0 for non numeric values and 0 value
        
        if($department_id == 0) return $this->errorService->getResponse(ErrorCodes::DEP_01);

        $department = $this->department->getSingleDepartment($department_id);

        if($department) return response()->json(new DepartmentResource($this->department->getSingleDepartment($department_id)));
        
        return $this->errorService->getResponse(ErrorCodes::DEP_02);
    }

}