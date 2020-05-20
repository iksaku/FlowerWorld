<?php

namespace App;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Carbon;

/**
 * App\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string|null $address
 * @property string $password
 * @property bool $is_admin
 * @property string|null $remember_token
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Collection|Invoice[] $invoices
 * @property-read int|null $invoices_count
 * @property-read Shop|null $shop
 * @property-read Collection|Product[] $shopping_cart
 * @property-read int|null $shopping_cart_count
 * @method static Builder|User newModelQuery()
 * @method static Builder|User newQuery()
 * @method static Builder|User query()
 * @method static Builder|User whereAddress($value)
 * @method static Builder|User whereCreatedAt($value)
 * @method static Builder|User whereEmail($value)
 * @method static Builder|User whereId($value)
 * @method static Builder|User whereIsAdmin($value)
 * @method static Builder|User whereName($value)
 * @method static Builder|User wherePassword($value)
 * @method static Builder|User whereRememberToken($value)
 * @method static Builder|User whereUpdatedAt($value)
 * @mixin Eloquent
 */
class User extends Authenticatable
{
    protected $fillable = [
        'name', 'email', 'address', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'is_admin' => 'boolean',
    ];

    public function invoices()
    {
        /* Obtiene todos los recibos del usuario */
        return $this->hasMany(Invoice::class);
    }

    public function shop()
    {
        /* Obtiene la tienda que le pertenece al usuario, en caso de ser dueño de alguna */
        return $this->hasOne(Shop::class, 'owner_id');
    }

    public function shopping_cart()
    {
        /* Obtiene los productos en el carrito del usuario */
        return $this->belongsToMany(Product::class, 'shopping_carts')
            ->using(ShoppingCarProductPivot::class)
            ->withPivot(['quantity']);
    }
}
