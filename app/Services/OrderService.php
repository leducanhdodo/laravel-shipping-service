<?php
namespace App\Services;

use App\Order;
use App\Services\Fee\FeeServiceFactory;

class OrderService
{
    /**
     * @var CoefficientService
     */
    private $coefficientService;

    /**
     * OrderService constructor.
     * @param CoefficientService $coefficientService
     */
    public function __construct(CoefficientService $coefficientService)
    {
        $this->coefficientService = $coefficientService;
    }

    /**
     * Calculate shipping fee for order
     * @param Order $order
     * @return float|int|mixed
     */
    public function calculateShippingFee(Order $order)
    {
        // Get all items in order
        $items = $order->items;
        $totalShippingFee = 0;
        $feeServices = [];

        $coefficients = $this->coefficientService->getCoefficients();

        foreach ($items as $item) {
            $shippingFeeByTypes = [];
            foreach (array_keys($coefficients) as $coefficient) {
                // Get fee service by type
                if (isset($feeServices[$coefficient])) {
                    $feeService = $feeServices[$coefficient];
                } else {
                    $feeService = FeeServiceFactory::create($coefficient);
                    $feeServices[$coefficient] = $feeService;
                }
                $shippingFee = $feeService->calculateShippingFee($item, $coefficients[$coefficient]);
                $shippingFeeByTypes[] = $shippingFee;
            }
            $totalShippingFee += max($shippingFeeByTypes);
        }

        return $totalShippingFee;
    }
}