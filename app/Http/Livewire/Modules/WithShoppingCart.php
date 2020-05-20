<?php


namespace App\Http\Livewire\Modules;


use App\Product;
use Illuminate\Support\Facades\Auth;
use Money\Money;

trait WithShoppingCart
{
    public function getShoppingCartProperty()
    {
        /* Si el usuario no se ha autenticado, se retorna un array vacío */
        if (Auth::guest()) {
            return collect();
        }

        /* Si el usuario esta autenticado, se retorna la lista de productos en carrito */
        return Auth::user()->shopping_cart;
    }

    public function getProductsProperty()
    {
        /* Agrupa los Productos en carrito por Tienda en la que se pidió */
        return $this->shoppingCart->groupBy(function (Product $product) {
            return $product->shop_id;
        });
    }

    public function getSubTotalProperty()
    {
        /* Calcula el total del recibo */
        $subtotal = Money::MXN(0);

        foreach ($this->shoppingCart as $product) {
            $quantity = $product->pivot->quantity;
            $subtotal = $subtotal->add($product->price->multiply($quantity));
        }

        return $subtotal;
    }
}
