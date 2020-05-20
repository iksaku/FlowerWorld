<?php

namespace App;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\Pivot;

/**
 * App\ShoppingCartItem
 *
 * @property integer $quantity
 * @method static Builder|ShoppingCarProductPivot newModelQuery()
 * @method static Builder|ShoppingCarProductPivot newQuery()
 * @method static Builder|ShoppingCarProductPivot query()
 * @mixin Eloquent
 */
class ShoppingCarProductPivot extends Pivot
{
    /** @var string[] */
    protected $fillable = [
        'quantity'
    ];

    /** @var string[] */
    protected $casts = [
        'quantity' => 'integer'
    ];
}
