<?php

namespace App\Repositories\Departments;

interface DepartmentInterface
{
    public function getAllDepartments();

    public function getSingleDepartment(int $department_id);
}