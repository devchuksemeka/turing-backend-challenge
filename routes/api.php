<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware("auth.jwt")->group(function(){
    Route::group(['prefix' => 'customer'], function () {
        Route::get('/', 'CustomerController@getCustomerProfile');
        Route::put('/', 'CustomerController@updateCustomerProfile');
        Route::put('/address', 'CustomerController@updateCustomerAddress');
        Route::put('/creditCard', 'CustomerController@updateCreditCard');
    });

    Route::group(['prefix' => 'shoppingcart'], function () {
        Route::get('/generateUniqueId', 'ShoppingCartController@generateUniqueCart');
        Route::post('/add', 'ShoppingCartController@addItemToCart');
        Route::get('/{cart_id}', 'ShoppingCartController@getCart');
        Route::put('/update/{item_id}', 'ShoppingCartController@updateCartItem');
        Route::delete('/empty/{cart_id}', 'ShoppingCartController@emptyCart');
        Route::delete('/removeProduct/{item_id}', 'ShoppingCartController@removeItemFromCart');
    });

    Route::group(['prefix' => 'orders'], function () {

        Route::post('/', 'ShoppingCartController@createOrder');
        Route::get('/inCustomer', 'ShoppingCartController@getCustomerOrders');
        Route::get('/{order_id}', 'ShoppingCartController@getOrderSummary');
        Route::get('/shortDetail/{order_id}', 'ShoppingCartController@getOrderShortDetail');
    });

    Route::post('/stripe/charge', 'ShoppingCartController@processStripePayment');
});

Route::group(['prefix' => 'attributes'], function () {
    Route::get('/', 'AttributeController@getAllAttributes');
    Route::get('/{attribute_id}', 'AttributeController@getSingleAttribute');
    Route::get('/values/{attribute_id}', 'AttributeController@getAttributeValues');
    Route::get('/inProduct/{product_id}', 'AttributeController@getProductAttributes');
});

Route::group(['prefix' => 'products'], function () {
    Route::get('/', 'ProductController@getAllProducts');
    Route::get('/search', 'ProductController@searchProduct');
    Route::get('/{product_id}', 'ProductController@getProduct');
    Route::get('/inCategory/{category_id}', 'ProductController@getProductsByCategory');
    Route::get('/inDepartment/{department_id}', 'ProductController@getProductsInDepartment');
    Route::get('/inDepartment/{department_id}', 'ProductController@getProductsInDepartment');
    Route::get('/{product_id}/reviews', 'ProductController@getProductReviews');
    Route::post('/{product_id}/reviews', 'ProductController@createProductReview');
});

Route::group(['prefix' => 'departments'], function () {
    Route::get('/', 'ProductController@getAllDepartments');
    Route::get('/{department_id}', 'ProductController@getDepartment');

});

Route::group(['prefix' => 'categories'], function () {
    Route::get('/', 'ProductController@getAllCategories');
    Route::get('/{category_id}', 'ProductController@getCategory');
    Route::get('/inProduct/{product_id}', 'ProductController@getProductCategory');
    Route::get('/inDepartment/{department_id}', 'ProductController@getDepartmentCategories');
});


Route::group(['prefix' => 'shipping'], function () {
    Route::group(['prefix' => 'regions'], function () {
        Route::get('/', 'ShippingController@getShippingRegions');
        Route::get('/{shipping_region_id}', 'ShippingController@getShippingType');
    });
});

Route::group(['prefix' => 'customers'], function () {
    Route::post('/', 'CustomerController@create');
    Route::post('/login', 'CustomerController@login');
    Route::post('/facebook', 'CustomerController@facebook');
    // Route::post('/', 'CustomerController@updateCreditCard');
});

Route::group(['prefix' => 'tax'], function () {
    Route::get('/', 'TaxController@getAllTax');
    Route::get('/{tax_id}', 'TaxController@getTaxById');
});
