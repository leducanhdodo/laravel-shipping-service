<?php

use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 10; $i++) {
            $order = \App\Order::create([
                'user_id' => 1,
                'order_number' => \App\Helpers\OrderHelper::generateOrderNumber(),
                'phone' => '2112121212',
                'address' => 'Test ' . $i
            ]);

            \App\Item::create([
                'name' => 'Item 1',
                'price' => 20,
                'type' => 'type 1',
                'height' => 0.4,
                'width' => 0.5,
                'depth' => 0.5,
                'weight' => 1,
                'order_id' => $order->id
            ]);

            \App\Item::create([
                'name' => 'Item 2',
                'price' => 10,
                'type' => 'type 2',
                'height' => 1.4,
                'width' => 0.5,
                'depth' => 0.5,
                'weight' => 10,
                'order_id' => $order->id
            ]);

            \App\Item::create([
                'name' => 'Item 3',
                'price' => 30,
                'type' => 'type 1',
                'height' => 0.4,
                'width' => 0.5,
                'depth' => 1.5,
                'weight' => 11,
                'order_id' => $order->id
            ]);
        }
    }
}
