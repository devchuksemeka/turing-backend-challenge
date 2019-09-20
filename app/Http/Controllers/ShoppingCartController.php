<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddItemToCartInputRequest;
use App\Services\Orders\OrderService;
use App\Services\ShoppingCarts\ShoppingCartService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Check each method in the shopping cart controller and add code to implement
 * the functionality or fix any bug.
 *
 *  NB: Check the BACKEND CHALLENGE TEMPLATE DOCUMENTATION in the readme of this repository to see our recommended
 *  endpoints, request body/param, and response object for each of these method
 *
 * Class ShoppingCartController
 * @package App\Http\Controllers
 */
class ShoppingCartController extends Controller
{
    protected $orderService;
    protected $shoppingCartService;

    public function __construct(OrderService $orderService,ShoppingCartService $shoppingCartService)
    {
        $this->orderService = $orderService;
        $this->shoppingCartService = $shoppingCartService;
    }

    /**
     * To generate a unique cart id.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function generateUniqueCart()
    {
        return $this->shoppingCartService->getCartUniqueId(Auth::user());
    }

    /**
     * To add new product to the cart.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function addItemToCart(AddItemToCartInputRequest $request)
    {
        return $this->shoppingCartService->addProduct(Auth::user(),$request->validated());
    }

    /**
     * Method to get list of items in a cart.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getCart()
    {
        return response()->json(['message' => 'this works']);
    }

    /**
     * Update the quantity of a product in the shopping cart.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateCartItem()
    {
        return response()->json(['message' => 'this works']);
    }

    /**
     * Should be able to clear shopping cart.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function emptyCart()
    {
        return response()->json(['message' => 'this works']);
    }

    /**
     * Should delete a product from the shopping cart.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function removeItemFromCart()
    {
        return response()->json(['message' => 'this works']);
    }

    /**
     * Create an order.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function createOrder()
    {
        return response()->json(['message' => 'this works']);
    }

    /**
     * Get all orders of a customer.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getCustomerOrders()
    {
        return response()->json(['message' => 'this works']);
    }

    /**
     * Get the details of an order.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getOrderSummary()
    {
        return response()->json(['message' => 'this works']);
    }

    /**
     * Process stripe payment.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function processStripePayment()
    {
        return response()->json(['message' => 'this works']);
    }
}
