<?php

namespace App\Helpers;

use Illuminate\Support\Str;

class NumberHelper
{
    /**
     * Return float string with decimals specified
     *
     * @param string $float
     * @return string
     */
    public static function floatDecimals(string $float, int $decimals = 2)
    {
        if (!Str::contains($float, '.')) return "{$float}.00";

        $float = explode('.', $float);
        $float = $float[0] . '.' . substr($float[1], 0, $decimals);

        return $float;
    }
}
