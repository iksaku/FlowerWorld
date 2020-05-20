<?php

namespace App;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

/**
 * App\Shop
 *
 * @property int $id
 * @property int $owner_id
 * @property string $name
 * @property string $email
 * @property string $address
 * @property int $branches
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read User $owner
 * @property-read Collection|Product[] $products
 * @property-read int|null $products_count
 * @property-read string $logo
 * @method static Builder|Shop newModelQuery()
 * @method static Builder|Shop newQuery()
 * @method static Builder|Shop query()
 * @method static Builder|Shop whereAddress($value)
 * @method static Builder|Shop whereBranches($value)
 * @method static Builder|Shop whereCreatedAt($value)
 * @method static Builder|Shop whereEmail($value)
 * @method static Builder|Shop whereId($value)
 * @method static Builder|Shop whereName($value)
 * @method static Builder|Shop whereOwnerId($value)
 * @method static Builder|Shop whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Shop extends Model
{
    protected $fillable = [
        'name', 'email', 'address', 'branches'
    ];

    protected $casts = [
        'branches' => 'integer'
    ];

    protected $with = [
        'owner'
    ];

    public function owner()
    {
        /* Obtiene la cuenta a la que pertenece la tienda */
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function products()
    {
        /* Obtiene los productos que pertenecen a la tienda */
        return $this->hasMany(Product::class);
    }

    protected function getLogoAttribute()
    {
        /* Obtiene la URL del logo de la tienda */
        return asset('img/' . Str::slug($this->name) . '.png');
    }
}
