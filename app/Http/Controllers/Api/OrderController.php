<?php

namespace App\Http\Controllers\Api;

use App\Helpers\OrderHelper;
use App\Item;
use App\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Response;

class OrderController extends Controller
{
    /**
     * OrderController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Order[]
     */
    public function index()
    {
        return Order::with('items')->get(20);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResource
     */
    public function store(Request $request)
    {
        return Order::create([
            'order_number' => OrderHelper::generateOrderNumber(),
            'phone' => $request->phone,
            'address' => $request->address,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Order|Order[]
     */
    public function show($id)
    {
        return Order::with('items')->findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Order[]
     */
    public function update(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $order->update($request->only(['phone', 'address']));

        return $order;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        return response()->json(null, 204);
    }

    /**
     * @param Request $request
     * @param $id
     * @return Order[]
     */
    public function addItem(Request $request, $id)
    {
        $order = Order::findOrFail($id);

        Item::create(array_merge($request->all(), ['order_id' => $id]));

        return $order;
    }
}
