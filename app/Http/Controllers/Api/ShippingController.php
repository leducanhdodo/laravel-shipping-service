<?php

namespace App\Http\Controllers\Api;

use App\Order;
use App\Services\OrderService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class ShippingController extends Controller
{
    /**
     * @var OrderService
     */
    private $orderService;

    /**
     * ShippingController constructor.
     * @param OrderService $orderService
     */
    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    /**
     * Get shipping fee for order
     *
     * @param $orderId
     * @return Response
     */
    public function getShippingFeeForOrder($orderId)
    {
        $order = Order::with('items')->findOrFail($orderId);
        $fee = $this->orderService->calculateShippingFee($order);

        return response()->json([
            'shipping_fee'=> $fee
        ]);
    }
}
