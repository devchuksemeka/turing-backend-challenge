<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductReview extends Model
{
    public $timestamps = false;

    protected $table = 'review';

    protected $primaryKey = 'review_id';

    protected $fillable = ["product_id","review","rating","customer_id","created_on"];

    public function product(){
        return $this->belongsTo(Product::class,'product_id','product_id');
    }
}
