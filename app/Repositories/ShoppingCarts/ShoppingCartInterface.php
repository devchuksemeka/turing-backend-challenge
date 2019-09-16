<?php

namespace App\Repositories\ShoppingCarts;

interface ShoppingCartInterface
{

    public function getSingle($item_id);

    public function addProduct(array $attributes);

    public function getAllItemInCartUsingCartId($cart_id);

    public function getCartUniqueId($customer_id);

    public function updateQuantityUsingItemId($item_id,$quantity);

    public function emptyCart($cart_id);

    public function removeItem($item_id);

}