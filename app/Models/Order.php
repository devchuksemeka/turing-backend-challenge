<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    const TABLE_NAME = "orders";
    public $timestamps = false;

    protected $table =  self::TABLE_NAME;

    protected $primaryKey = 'order_id';

    protected $guarded = [];

    protected $casts = [
      "status" => "string"
    ];

    public function orderDetails(){
        return $this->hasMany(OrderDetail::class,"order_id","order_id");
    }

    public function customer(){
        return $this->belongsTo(Customer::class,"customer_id","customer_id");
    }
}
