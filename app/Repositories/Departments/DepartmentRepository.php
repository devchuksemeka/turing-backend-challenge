<?php

namespace App\Repositories\Departments;

use App\Models\Department;

class DepartmentRepository implements DepartmentInterface{

    protected $department;

    public function __construct(Department $department)
    {
        $this->department = $department;
    }
    
    public function getAllDepartments(){
        return $this->department->all();
    }

    public function getSingleDepartment(int $department_id)
    {
        return $this->department->find($department_id);
    }
}