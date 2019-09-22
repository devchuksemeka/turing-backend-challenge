<?php

namespace App\Services\Departments;

use App\Exceptions\Department\DepartmentIdNotNumberException;
use App\Exceptions\Department\DepartmentNotFoundException;
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

        if($department_id == 0) throw new DepartmentIdNotNumberException();

        $department = $this->department->getSingleDepartment($department_id);

        if($department) return response()->json(new DepartmentResource($this->department->getSingleDepartment($department_id)));

        throw new DepartmentNotFoundException();
    }

}
