<?php

namespace App\Repositories\ProductCategories;

use App\Models\ProductCategory as Model;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class ProductCategoryRepository implements ProductCategoryInterface{

    protected $model;
    protected $request;

    public function __construct(Model $model,Request $request)
    {
        $this->model = $model;
        $this->request = $request;
    }
    
    public function getAll(){
        return $this->model->all();
    }

    public function getSingleWithProduct(int $id)
    {
        return $this->model->where("product_id",$id)->first();
    }

    public function getAllProductsInCategory(int $category_id){

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

        return $this->model->join("product","product_category.product_id","=","product.product_id")
            ->select(DB::raw("product.product_id, product.name, SUBSTRING(`product`.`description`,1,".Arr::get($appendQueryParams,'description_limit').") as description, product.price, product.discounted_price, product.thumbnail"))
            ->where("product_category.category_id",$category_id)
            ->paginate(Arr::get($appendQueryParams,'limit'))->appends($appendQueryParams);
    }
}