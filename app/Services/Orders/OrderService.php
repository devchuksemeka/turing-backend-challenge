<?php

namespace App\Services\Orders;

use App\Enums\ErrorCodes;
use App\Http\Resources\CreateOrderResource;
use App\Http\Resources\CustomerOrdersCollection;
use App\Http\Resources\OrderShortDetailResource;
use App\Http\Resources\ShoppingCartItemCollection;
use App\Http\Resources\SingleOrderResource;
use App\Models\Customer;
use App\Repositories\OrderDetails\OrderDetailInterface;
use App\Repositories\Orders\OrderInterface as RepoInterface;
use App\Repositories\ShoppingCarts\ShoppingCartInterface;
use App\Services\Errors\ErrorServiceInterface;
use Carbon\Carbon;
use Illuminate\Support\Arr;

class OrderService{

    protected $repository;
    protected $shoppingCartRepo;
    protected $errorService;

    public function __construct(RepoInterface $repoInterface, ErrorServiceInterface $errorServiceInterface,
        ShoppingCartInterface $shoppingCartInterface, OrderDetailInterface $orderDetail)
    {
        $this->repository = $repoInterface;
        $this->shoppingCartRepo = $shoppingCartInterface;
        $this->errorService = $errorServiceInterface;
        $this->orderDetail = $orderDetail;
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


    public function create(Customer $customer, array $attributes){
        $totalAmount = $this->getCartItemsTotalAmount(Arr::get($attributes,"cart_id"));
        $cart_id = Arr::get($attributes,"cart_id");
        Arr::set($attributes,"total_amount",$totalAmount);
        Arr::set($attributes,"customer_id",$customer->customer_id);
        Arr::set($attributes,"created_on",Carbon::now());
        Arr::forget($attributes,"cart_id");

        $orderCreated = $this->repository->create($attributes);

        $this->createOrderDetailsUsingCartId($cart_id,$orderCreated->order_id);

        // create order details
        return new CreateOrderResource($orderCreated);
    }

    protected function createOrderDetailsUsingCartId($cart_id,$order_id){
        $cartItems = $this->shoppingCartRepo->getAllItemInCartUsingCartId($cart_id);

        foreach($cartItems as $cart_item){

            $this->orderDetail->create([
//                "item_id" => $cart_item->item_id,
                "order_id" => $order_id,
                "product_id" => $cart_item->product_id,
                "attributes" => $cart_item->attributes,
                "product_name" => $cart_item->product->name,
                "quantity" => $cart_item->quantity,
                "unit_cost" => (float)$cart_item->unit_cost,
            ]);
        }
    }

    public function getOrderSummary($order_id){
        return new SingleOrderResource($this->repository->getOrderSummaryUsingOrderId($order_id));
    }

    public function getOrderShortDetail($order_id){
        return new OrderShortDetailResource($this->repository->getOrderSummaryUsingOrderId($order_id));
    }

    public function getCustomerOrders(Customer $customer){
        return new CustomerOrdersCollection($this->repository->getCustomerOrders($customer->customer_id));
    }


}
