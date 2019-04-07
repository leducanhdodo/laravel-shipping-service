<?php
namespace App\Services\Fee;

use App\Item;

class DimensionFeeService extends AbstractFeeService
{
    protected $type = 'dimension';

    /**
     * Calculate shipping fee by dimension
     * @param Item $product
     * @param $coefficient
     * @return float|int
     */
    public function calculateShippingFee(Item $product, $coefficient)
    {
        return $product->width * $product->height * $product->depth * $coefficient;
    }
}