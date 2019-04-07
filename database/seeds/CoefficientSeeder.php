<?php

use Illuminate\Database\Seeder;

class CoefficientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\ShippingCoefficient::create([
            'type' => 'weight',
            'value' => 11,
            'active' => true
        ]);

        \App\ShippingCoefficient::create([
            'type' => 'dimension',
            'value' => 11,
            'active' => true
        ]);
    }
}
