<?php

namespace App\Repositories\ShoppingCarts;

use App\Models\ShoppingCart as Model;

class ShoppingCartRepository implements ShoppingCartInterface{

    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function getSingle($item_id)
    {
        return $this->model->find($item_id);
    }

    public function addProduct(array $attributes)
    {
        return $this->model->create($attributes);
    }

    public function getAllItemInCartUsingCartId($cart_id)
    {
        return $this->model->where("cart_id",$cart_id)->get();
    }

    public function getCartUniqueId($customer_id)
    {
        $cart = $this->model->where("customer_id",$customer_id)->select("cart_id")->first();
        if($cart) return $cart->cart_id;

        return uniqid($customer_id.'_');
    }

    public function updateQuantityUsingItemId($item_id,$quantity)
    {
        $this->model->find($item_id)->update([
            "quantity" => $quantity
        ]);
        return $this->model->find($item_id);
    }

    public function emptyCart($cart_id)
    {
        $deleteStatus = $this->model->where("cart_id",$cart_id)->delete();
        return $this->model->where("cart_id",$cart_id)->get();
    }

    public function removeItem($item_id)
    {
        return $this->getSingle($item_id)->delete();
    }
}