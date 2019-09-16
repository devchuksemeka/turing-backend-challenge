<?php

namespace App\Repositories\ProductReviews;

interface ProductReviewInterface
{
    public function getAll();

    public function getAllReviewsInProduct($product_id);
    
}