<?php

namespace App\Casts;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Illuminate\Database\Eloquent\Model;
use Money\Money;

class MoneyCast implements CastsAttributes
{
    /**
     * Cast the given value.
     *
     * @param Model $model
     * @param string $key
     * @param mixed $value
     * @param array $attributes
     * @return Money
     */
    public function get($model, $key, $value, $attributes)
    {
        /* Convierte la cantidad entera en moneda nacional */
        return Money::MXN($value);
    }

    /**
     * Prepare the given value for storage.
     *
     * @param Model $model
     * @param string $key
     * @param Money|int $value
     * @param array $attributes
     * @return string
     */
    public function set($model, $key, $value, $attributes)
    {
        /* Si se provee una moneda nacional, se convierte en un numero entero */
        if ($value instanceof Money) {
            return $value->getAmount();
        }

        /* Si se provee un numero entero, se guarda como tal */
        return $value;
    }
}
