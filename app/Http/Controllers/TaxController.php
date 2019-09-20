<?php

namespace App\Http\Controllers;

use App\Services\Taxes\TaxService;
use Illuminate\Http\Request;

/**
 * Tax controller contains methods which are needed for all tax request
 * Implement the functionality for the methods
 *
 *  NB: Check the BACKEND CHALLENGE TEMPLATE DOCUMENTATION in the readme of this repository to see our recommended
 *  endpoints, request body/param, and response object for each of these method
 */
class TaxController extends Controller
{
    protected $taxService;

    public function __construct(TaxService $taxService)
    {
        $this->taxService = $taxService;
    }

    /**
     * This method get all taxes.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAllTax()
    {
        return $this->taxService->getAll();
    }

    /**
     * This method gets a single tax using the tax id.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getTaxById()
    {
        return response()->json(['message' => 'this works']);
    }
}
