<?php

namespace App\Services\ShoppingCarts;

use App\Http\Resources\ShoppingCartItemCollection;
use App\Http\Resources\ShoppingCartResource;
use App\Models\Customer;
use App\Repositories\ShoppingCarts\ShoppingCartInterface as RepoInterface;
use App\Services\Errors\ErrorServiceInterface;
use Carbon\Carbon;
use Illuminate\Support\Arr;

class ShoppingCartService{

    protected $repository;
    protected $errorService;

    public function __construct(RepoInterface $repoInterface,
        ErrorServiceInterface $errorServiceInterface)
    {
        $this->repository = $repoInterface;
        $this->errorService = $errorServiceInterface;
    }

    public function getCartUniqueId(Customer $customer){
        return response()->json([
            "cart_id" => $this->repository->getCartUniqueId($customer->customer_id)
        ]);
    }

    public function addProduct(Customer $customer, array $attributes){
        Arr::set($attributes,"added_on",Carbon::now());
        Arr::set($attributes,"customer_id",$customer->customer_id);
        return new ShoppingCartResource($this->repository->addProduct($attributes));
    }

    public function getAllItemInCartUsingCartId($cart_id){
        return new ShoppingCartItemCollection($this->repository->getAllItemInCartUsingCartId($cart_id));
    }

    public function updateQuantityUsingItemId($item_id, array $attributes){
        return new ShoppingCartResource($this->repository->updateQuantityUsingItemId($item_id,Arr::get($attributes,"quantity")));
    }

    public function emptyCart($cart_id){
        return $this->repository->emptyCart($cart_id);
    }

    public function removeItem($item_id){
        if($this->repository->getSingle($item_id)) {
            if($this->repository->removeItem($item_id)) return response()->json(["message" => "Item deleted successfully"]);
            return response()->json(["message"=>"Item could not be deleted"],422);
        }
        return response()->json(["message"=>"Item not found"],404);
    }

}