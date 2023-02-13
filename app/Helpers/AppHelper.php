<?php

namespace App\Helpers;

class AppHelper
{

    static function getPercentage(float $parts, int $wholeParts): float
    {
        return  ($parts/$wholeParts) * 100;
    }
}
