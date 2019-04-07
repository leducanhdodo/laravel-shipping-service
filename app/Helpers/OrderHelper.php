<?php

namespace App\Helpers;

use Illuminate\Support\Str;

class OrderHelper
{
    public static function generateOrderNumber()
    {
        return Str::uuid()->toString();
    }
}