<?php

namespace App;

use App\Casts\MoneyCast;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Money\Money;

/**
 * App\Product
 *
 * @property int $id
 * @property int $shop_id
 * @property string $name
 * @property string $image
 * @property Money $price
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Shop $shop
 * @method static Builder|Product newModelQuery()
 * @method static Builder|Product newQuery()
 * @method static Builder|Product query()
 * @method static Builder|Product whereCreatedAt($value)
 * @method static Builder|Product whereId($value)
 * @method static Builder|Product whereImage($value)
 * @method static Builder|Product whereName($value)
 * @method static Builder|Product wherePrice($value)
 * @method static Builder|Product whereShopId($value)
 * @method static Builder|Product whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Product extends Model
{
    protected $fillable = [
        'name', 'image', 'price'
    ];

    protected $casts = [
        'price' => MoneyCast::class
    ];

    protected $with = [
        'shop'
    ];

    public function shop()
    {
        /* Obtiene la tienda a la que pertenece este producto */
        return $this->belongsTo(Shop::class);
    }
}
