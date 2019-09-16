<?php

namespace App\Providers;

use App\Repositories\Attributes\AttributeInterface;
use App\Repositories\Attributes\AttributeRepository;
use App\Repositories\AttributeValues\AttributeValueInterface;
use App\Repositories\AttributeValues\AttributeValueRepository;
use App\Repositories\Categories\CategoryInterface;
use App\Repositories\Categories\CategoryRepository;
use App\Repositories\Customers\CustomerInterface;
use App\Repositories\Customers\CustomerRepository;
use App\Repositories\Departments\DepartmentInterface;
use App\Repositories\Departments\DepartmentRepository;
use App\Repositories\Orders\OrderInterface;
use App\Repositories\Orders\OrderRepository;
use App\Repositories\ProductAttributes\ProductAttributeInterface;
use App\Repositories\ProductAttributes\ProductAttributeRepository;
use App\Repositories\ProductCategories\ProductCategoryInterface;
use App\Repositories\ProductCategories\ProductCategoryRepository;
use App\Repositories\ProductReviews\ProductReviewInterface;
use App\Repositories\ProductReviews\ProductReviewRepository;
use App\Repositories\Products\ProductInterface;
use App\Repositories\Products\ProductRepository;
use App\Repositories\ShippingRegions\ShippingRegionInterface;
use App\Repositories\ShippingRegions\ShippingRegionRepository;
use App\Repositories\Shippings\ShippingInterface;
use App\Repositories\Shippings\ShippingRepository;
use App\Repositories\ShoppingCarts\ShoppingCartInterface;
use App\Repositories\ShoppingCarts\ShoppingCartRepository;
use App\Repositories\Taxes\TaxInterface;
use App\Repositories\Taxes\TaxRepository;
use App\Services\Customers\AppDefaultLoginService;
use App\Services\Customers\LoginInterface;
use App\Services\Errors\ErrorService;
use App\Services\Errors\ErrorServiceInterface;
use Illuminate\Http\Resources\Json\Resource;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // REPOSITORIES
        $this->app->singleton(DepartmentInterface::class,DepartmentRepository::class);
        $this->app->singleton(CategoryInterface::class,CategoryRepository::class);
        $this->app->singleton(ProductCategoryInterface::class,ProductCategoryRepository::class);
        $this->app->singleton(AttributeInterface::class,AttributeRepository::class);
        $this->app->singleton(AttributeValueInterface::class,AttributeValueRepository::class);
        $this->app->singleton(ProductAttributeInterface::class,ProductAttributeRepository::class);
        $this->app->singleton(ProductInterface::class,ProductRepository::class);
        $this->app->singleton(ProductReviewInterface::class,ProductReviewRepository::class); // Product Review
        $this->app->singleton(CustomerInterface::class,CustomerRepository::class); // Customer
        $this->app->singleton(OrderInterface::class,OrderRepository::class);// Order
        $this->app->singleton(ShoppingCartInterface::class,ShoppingCartRepository::class);// Shopping Cart
        $this->app->singleton(TaxInterface::class,TaxRepository::class);// Tax
        $this->app->singleton(ShippingRegionInterface::class,ShippingRegionRepository::class);// Shipping Region
        $this->app->singleton(ShippingInterface::class,ShippingRepository::class);// Shipping

        // SERVICES
        $this->app->bind(ErrorServiceInterface::class,ErrorService::class);
        $this->app->bind(LoginInterface::class,AppDefaultLoginService::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Resource::withoutWrapping();
    }
}
