<?php

namespace App\Repositories\ProductReviews;

use App\Models\ProductReview as Model;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class ProductReviewRepository implements ProductReviewInterface{

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

    public function getAllReviewsInProduct($product_id)
    {
        return $this->model->where("product_id",$product_id)->get();
    }

    public function create(array $attributes)
    {
        Arr::set($attributes,"created_on",Carbon::now());
        Arr::set($attributes,"customer_id",1);
        return $this->model->create($attributes);
    }

}