<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductAttribute extends Model
{
    public $timestamps = false;

    protected $table = 'product_attribute';

    public function attributeValue(){
        return $this->belongsTo(AttributeValue::class,'attribute_value_id','attribute_value_id');
    }
}
