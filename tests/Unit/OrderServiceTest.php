<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class OrderServiceTest extends TestCase
{
    /**
     * test get orders
     *
     * @return void
     */
    public function testGetOrders()
    {
        $user = factory(\App\User::class)->create();
        $response = $this->actingAs($user, 'api')->json('GET', '/api/orders');
        $response->assertStatus(200);
    }

    public function testGetOrderById()
    {
        $user = factory(\App\User::class)->create();
        $response = $this->actingAs($user, 'api')->json('GET', '/api/orders/1');
        $response->assertStatus(200);
    }

    public function testUpdateOrder()
    {
        $user = factory(\App\User::class)->create();
        $response = $this->actingAs($user, 'api')->json('GET', '/api/orders');
        $response->assertStatus(200);

        $order = $response->getData()[0];

        $update = $this->actingAs($user, 'api')->json('PATCH', '/api/orders/' . $order->id,
            [
                'address' => 'Test'
            ]
        );
        $update->assertStatus(200);
    }

    public function testDeleteOrder()
    {
        {
            $user = factory(\App\User::class)->create();
            $response = $this->actingAs($user, 'api')->json('GET', '/api/orders');
            $response->assertStatus(200);

            $order = $response->getData()[0];

            $update = $this->actingAs($user, 'api')->json('DELETE', '/api/orders/' . $order->id);
            $update->assertStatus(204);
        }
    }
}
