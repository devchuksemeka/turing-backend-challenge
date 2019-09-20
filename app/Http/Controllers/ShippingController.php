<?php

namespace App\Http\Controllers;

use App\Models\Shipping;
use App\Models\ShippingRegion;
use App\Services\ShippingRegions\ShippingRegionService;
use App\Services\Shippings\ShippingService;
use Illuminate\Http\Request;

/**
 * The Shipping Controller contains all the methods that handles all shipping request
 * This piece of code work fine, but you can test and debug any detected issue
 *
 * Class ShippingController
 * @package App\Http\Controllers
 */
class ShippingController extends Controller
{
    protected $shippingRegionService;
    protected $shippingService;

    public function __construct(ShippingRegionService $shippingRegionService, ShippingService $shippingService)
    {
        $this->shippingRegionService = $shippingRegionService;
        $this->shippingService = $shippingService;
    }

    /**
     * Returns a list of all shipping region.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getShippingRegions()
    {
        return $this->shippingRegionService->getAll();
    }

    /**
     * Returns a list of shipping type in a specific shipping region.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getShippingType($shipping_region_id)
    {
        return $this->shippingService->getAllShippingInRegion($shipping_region_id);
    }
}
