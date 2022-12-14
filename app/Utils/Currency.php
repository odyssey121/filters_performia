<?php

namespace App\Utils;

use Illuminate\Support\Facades\Facade;
use JetBrains\PhpStorm\Pure;

class Currency extends Facade
{

    #[Pure] public static function convertCent(int $amount): float
    {
        return $amount / 100;
    }

    #[Pure] public static function convertRaw(float $amount): int
    {
        return $amount * 100;
    }
}
