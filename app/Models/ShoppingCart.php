<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

/**
 * Class ShoppingCart
 * @package App\Models
 * @property int $item_id
 * @property int $cart_id
 * @property int $product_id
 * @property string $attributes
 * @property int $quantity
 * @property boolean $buy_now
 * @property string $added_on
 * @property int $customer_id
 * @property \App\User $user
 */
class ShoppingCart extends Model
{
    public $timestamps = false;

    protected $table = 'shopping_cart';
    protected $primaryKey = 'item_id';
    protected $guarded = ['item_id'];

    public function getSubtotalAttribute(){
        $price = (float)$this->product->price;
        $discounted_price = (float)$this->product->discounted_price;
        $quantity = (float)$this->quantity;
        if($discounted_price) $total = $quantity * $discounted_price;
        else $total = $quantity * $price;
        return (string)$total;
    }

    public function getUnitCostAttribute(){
        $price = (float)$this->product->price;
        $discounted_price = (float)$this->product->discounted_price;
        if($discounted_price) $unit_cost = $discounted_price;
        else $unit_cost = $price;
        return (string)$unit_cost;
    }

    public function product(){
        return $this->belongsTo(Product::class,'product_id','product_id');
    }
}
