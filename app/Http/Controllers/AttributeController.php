<?php

namespace App\Http\Controllers;

use App\Services\Attributes\AttributeService;
use Illuminate\Http\Request;

/**
 * The controller defined below is the attribute controller.
 * Some methods needs to be implemented from scratch while others may contain one or two bugs.
 *
 * NB: Check the BACKEND CHALLENGE TEMPLATE DOCUMENTATION in the readme of this repository to see our recommended
 *  endpoints, request body/param, and response object for each of these method
 *
 *
 * Class AttributeController
 * @package App\Http\Controllers
 */
class AttributeController extends Controller
{

    protected $attributeService;
    /**
     * Inject Attributes Service class into the constructor
     */
    public function __construct(AttributeService $attributeService)
    {
        $this->attributeService = $attributeService;
    }


    /**
     * This method should return an array of all attributes.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAllAttributes()
    {
        return $this->attributeService->getAll();
    }

    /**
     * This method should return a single attribute using the attribute_id in the request parameter.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getSingleAttribute($attribute_id)
    {
        return $this->attributeService->getSingle($attribute_id);
    }

    /**
     * This method should return an array of all attribute values of a single attribute using the attribute id.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAttributeValues($attribute_id)
    {
        return $this->attributeService->getAllAttributesValueInAttribute($attribute_id);
    }

    /**
     * This method should return an array of all the product attributes.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getProductAttributes($product_id)
    {
        return $this->attributeService->getAllAttributesOfSingleProduct($product_id);
    }
}
