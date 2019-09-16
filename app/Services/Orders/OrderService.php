<?php

namespace App\Services\Orders;

use App\Enums\ErrorCodes;
use App\Http\Resources\CreateOrderResource;
use App\Http\Resources\ShoppingCartItemCollection;
use App\Http\Resources\SingleOrderResource;
use App\Repositories\Orders\OrderInterface as RepoInterface;
use App\Repositories\ShoppingCarts\ShoppingCartInterface;
use App\Services\Errors\ErrorServiceInterface;
use Carbon\Carbon;
use Illuminate\Support\Arr;

class OrderService{

    protected $repository;
    protected $shoppingCartRepo;
    protected $errorService;

    public function __construct(RepoInterface $repoInterface,
        ErrorServiceInterface $errorServiceInterface,
        ShoppingCartInterface $shoppingCartInterface)
    {
        $this->repository = $repoInterface;
        $this->shoppingCartRepo = $shoppingCartInterface;
        $this->errorService = $errorServiceInterface;
    }

    protected function getCartItemsTotalAmount($cart_id){
        $cartItems = $this->shoppingCartRepo->getAllItemInCartUsingCartId($cart_id);
        $cartItems = new ShoppingCartItemCollection($cartItems);
        return $this->getTotalAmountFromArray($cartItems);

    }

    protected function getTotalAmountFromArray($cartItems){
        $totalAmount = 0.0;
        foreach($cartItems as $cartItem){
            $totalAmount += (float)$cartItem["subtotal"];
        }

        return $totalAmount;
    }
   

    public function create(array $attributes){
        $totalAmount = $this->getCartItemsTotalAmount(Arr::get($attributes,"cart_id"));

        Arr::set($attributes,"total_amount",$totalAmount);
        Arr::set($attributes,"created_on",Carbon::now());
        Arr::forget($attributes,"cart_id");

        $orderCreated = $this->repository->create($attributes);
        return new CreateOrderResource($orderCreated);
    }

    protected function createOrderDetailsUsingCartId($cart_id,$order_id){

    }

    public function getOrderSummary($order_id){
        return new SingleOrderResource($this->repository->getOrderSummaryUsingOrderId($order_id));
    }


}