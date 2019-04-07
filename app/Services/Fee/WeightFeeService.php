<?php
namespace App\Services\Fee;

use App\Item;

class WeightFeeService extends AbstractFeeService
{
    protected $type = 'weight';

    /**
     * Calculate shipping fee by weight
     * @param Item $product
     * @param $coefficient
     * @return float|int|mixed
     */
    public function calculateShippingFee(Item $product, $coefficient)
    {
        return $product->weight * $coefficient;
    }
}