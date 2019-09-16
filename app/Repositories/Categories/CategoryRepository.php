<?php

namespace App\Repositories\Categories;

use App\Models\Category as Model;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class CategoryRepository implements CategoryInterface{

    protected $model;
    protected $request;

    public function __construct(Model $model, Request $request)
    {
        $this->model = $model;
        $this->request = $request;
    }
    
    public function getAll(){
        return $this->model->all();
    }
    
    public function getAllCategoriesInDepartment($department_id){
        return $this->model->where("department_id",$department_id)->get();
    }

    public function getSingle(int $id)
    {
        return $this->model->find($id);
    }

    public function getAllProductsInDepartment($department_id){

        $appendQueryParams = [
            "page" => 1,
            "limit" => 20,
            "description_limit" => 200
        ];

        $queryPage = $this->request->query("page");
        $queryLimit = $this->request->query("limit");
        $queryDescriptionLimit = $this->request->query("description_limit");

        if($queryPage){
            Arr::set($appendQueryParams,"page",$queryPage);
        }

        if( $queryLimit){
            Arr::set($appendQueryParams,"limit", $queryLimit);
        }

        if($queryDescriptionLimit){
            Arr::set($appendQueryParams,"description_limit",$queryDescriptionLimit);
        }

        return $this->model
            ->join("product_category","category.category_id","=","product_category.category_id")
            ->join("product","product_category.product_id","=","product.product_id")
            ->select(DB::raw("product.product_id, product.name, SUBSTRING(`product`.`description`,1,".Arr::get($appendQueryParams,'description_limit').") as description, product.price, product.discounted_price, product.thumbnail"))
            ->where("category.department_id",$department_id)
            ->paginate(Arr::get($appendQueryParams,'limit'))->appends($appendQueryParams);
    }
}