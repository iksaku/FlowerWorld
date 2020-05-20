<?php

use Money\Currencies\ISOCurrencies;
use Money\Formatter\IntlMoneyFormatter;
use Money\Money;

if (!function_exists('price')) {
    function price(Money $money) {
        $formatter = new IntlMoneyFormatter(
            new \NumberFormatter('es_MX', \NumberFormatter::CURRENCY),
            new ISOCurrencies()
        );

        return $formatter->format($money);
    }
}
