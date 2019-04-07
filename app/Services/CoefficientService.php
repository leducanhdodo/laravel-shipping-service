<?php
namespace App\Services;

use App\ShippingCoefficient;

class CoefficientService
{
    /**
     * @return array
     */
    public function getCoefficients()
    {
        $results = [];
        $coefficients = ShippingCoefficient::all();
        foreach ($coefficients as $coefficient) {
            $results[$coefficient->type] = $coefficient->value;
        }

        return $results;
    }
}