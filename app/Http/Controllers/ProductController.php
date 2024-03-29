<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProductReviewRequest;
use App\Http\Resources\DepartmentResource;
use App\Services\ProductReviews\ProductReviewService;
use App\Repositories\Departments\DepartmentInterface;
use App\Services\Categories\CategoryService;
use App\Services\Departments\DepartmentService;
use App\Services\ProductCategories\ProductCategoryService;
use App\Services\Products\ProductService;

/**
 * The Product controller contains all methods that handles product request
 * Some methods work fine, some needs to be implemented from scratch while others may contain one or two bugs/
 *
 *  NB: Check the BACKEND CHALLENGE TEMPLATE DOCUMENTATION in the readme of this repository to see our recommended
 *  endpoints, request body/param, and response object for each of these method.
 */
class ProductController extends Controller
{
    protected $department;
    protected $departmentService;
    protected $productService;

    public function __construct(DepartmentInterface $departmentInterface,
        DepartmentService $departmentService,
        ProductService $productService){
        $this->department = $departmentInterface;
        $this->productService = $productService;
        $this->departmentService = $departmentService;
    }

    /**
     * Return a paginated list of products.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAllProducts()
    {
        return $this->productService->getAllWithPagination();
    }

    /**
     * Returns a single product with a matched id in the request params.
     *
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getProduct($product_id)
    {
        return $this->productService->getSingle($product_id);
    }

    /**
     * Returns a list of product that matches the search query string.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function searchProduct()
    {
        return $this->productService->getAllSearchWithPagination();
    }

    /**
     * Returns all products in a product category.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getProductsByCategory($category_id,ProductCategoryService $productCategoryService)
    {
        return $productCategoryService->getAllProductsInCategory($category_id);
    }

    /**
     * Returns a list of products in a particular department.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getProductsInDepartment($department_id,CategoryService $categoryService)
    {
        return $categoryService->getAllProductsInDepartment($department_id);
    }

    /**
     * Returns a single product reviews with a matched id in the request params.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function createProductReview($product_id, CreateProductReviewRequest $request, ProductReviewService $productReviewService)
    {
        return $productReviewService->create($request->validated());
    }

    /**
     * Returns a single product reviews with a matched id in the request params.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getProductReviews($product_id,ProductReviewService $productReviewService)
    {
        return $productReviewService->getAllReviewsInProduct($product_id);
    }

    /**
     *
     * @group DEPARTMENTS
     *
     * GET ALL DEPARTMENTS
     * This endpoint retrieve the list of departments from the database and returns an array of department objects to the user
     *
     * @response  [
     *   {
    *       "department_id": integer,
    *       "name": string,
    *       "description" : string,
    *   },
     * ]
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAllDepartments()
    {
        return response()->json(DepartmentResource::collection($this->department->getAllDepartments()));
    }

    /**
     * @group DEPARTMENTS
     *
     * GET A SINGLE DEPARTMENT
     * This endpoint get a single department using the department Id in the request params.
     *
     * @param $department_id
     * @return \Illuminate\Http\JsonResponse
     * @throws \App\Exceptions\Department\DepartmentIdNotNumberException
     * @throws \App\Exceptions\Department\DepartmentNotFoundException
     */
    public function getDepartment($department_id)
    {
        return $this->departmentService->getSingleDepartment($department_id);

    }

    /**
     * Returns all categories.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAllCategories(CategoryService $categoryService)
    {
        return $categoryService->getAll();
    }

    /**
     * Returns all categories in a department.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getCategory($category_id,CategoryService $categoryService)
    {
        return $categoryService->getSingle($category_id);
    }

    /**
     * Returns all categories in a department.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getProductCategory($product_id,ProductCategoryService $productCategoryService)
    {
        return $productCategoryService->getSingleWithProduct($product_id);
    }

    /**
     * Returns all categories in a department.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getDepartmentCategories($department_id,CategoryService $categoryService)
    {
        return $categoryService->getAllCategoriesInDepartment($department_id);
    }
}
