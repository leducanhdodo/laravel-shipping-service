<?php
namespace App\Services\Fee;

use App\Item;
use App\Services\CoefficientService;

abstract class AbstractFeeService
{
    protected $type = null;

    /**
     * @var CoefficientService
     */
    protected $coefficientService;

    /**
     * AbstractFeeService constructor.
     * @param CoefficientService $coefficientService
     */
    public function __construct(CoefficientService $coefficientService)
    {
        $this->coefficientService = $coefficientService;
    }

    /**
     * @param Item $product
     * @param $coefficient
     * @return mixed
     */
    abstract public function calculateShippingFee(Item $product, $coefficient);
}