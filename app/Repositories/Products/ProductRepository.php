<?php

namespace App\Repositories\Products;

use App\Models\Product as Model;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class ProductRepository implements ProductInterface{

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
    
    public function getAllWithPagination(){
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

        return $this->model->select(DB::raw("product_id, name, SUBSTRING(`description`,1,".Arr::get($appendQueryParams,'description_limit').") as description, price, discounted_price, thumbnail"))
            ->paginate(Arr::get($appendQueryParams,'limit'))->appends($appendQueryParams);
    }

    public function getAllSearchWithPagination(){
        $appendQueryParams = [
            "page" => 1,
            "limit" => 20,
            "description_limit" => 200,
            "query_string" => null,
            "all_words" => "on"
        ];

        $queryQueryString = $this->request->query("query_string");
        $queryAllWordMode = $this->request->query("all_words");
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

        if($queryQueryString){
            Arr::set($appendQueryParams,"query_string",$queryQueryString);
        }

        if($queryAllWordMode){
            Arr::set($appendQueryParams,"all_words",$queryAllWordMode);
        }


        $queryBuilder = $this->model->select(DB::raw("product_id, name, SUBSTRING(`description`,1,".Arr::get($appendQueryParams,'description_limit').") as description, price, discounted_price, thumbnail"));

        if($queryQueryString){
            if($queryAllWordMode == "on") $queryBuilder = $queryBuilder->where("name","LIKE","%".Arr::get($appendQueryParams,'query_string')."%");
            else $queryBuilder = $queryBuilder->where("name","=",Arr::get($appendQueryParams,'query_string'));
            
        }
        return $queryBuilder->paginate(Arr::get($appendQueryParams,'limit'))->appends($appendQueryParams);
    }

    public function getSingle(int $id)
    {
        $appendQueryParams = [
            "description_limit" => 200
        ];
        
        $queryDescriptionLimit = $this->request->query("description_limit");

        if($queryDescriptionLimit){
            Arr::set($appendQueryParams,"description_limit",$queryDescriptionLimit);
        }

        return $this->model->select(DB::raw("product_id, 
            name, 
            SUBSTRING(`description`,1,".Arr::get($appendQueryParams,'description_limit').") as description, 
            price, 
            discounted_price, 
            thumbnail,
            image,
            image_2,
            display"))
            ->where("product_id",$id)
            ->first();
    }

    public function getSingleProductCategory(int $id)
    {
        $product = $this->model->find($id);
        if($product) return $product->category;
    }
}