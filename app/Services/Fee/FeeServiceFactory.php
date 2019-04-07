<?php
namespace App\Services\Fee;

use App\Services\CoefficientService;

class FeeServiceFactory
{
    /**
     * @param $feeType
     * @return AbstractFeeService|mixed
     */
    public static function create($feeType)
    {
        $feeService = 'App\Services\Fee\\' . ucwords($feeType) . 'FeeService';
        if (class_exists($feeService)) {
            // Initialize coefficient service to inject to fee service
            $coefficientService = new CoefficientService();
            return new $feeService($coefficientService);
        } else {
            throw new Exception('Invalid fee type given.');
        }
    }
}