<?php


namespace App\Http\Livewire\Modules;


use Illuminate\Support\Facades\Auth;
use Money\Money;

trait WithShoppingCart
{
    public function getProductsProperty()
    {
        if (Auth::guest()) {
            return [];
        }

        return Auth::user()->shopping_cart;
    }

    public function getSubTotalProperty()
    {
        $subtotal = Money::MXN(0);

        foreach ($this->products as $product) {
            $quantity = $product->pivot->quantity;
            $subtotal = $subtotal->add($product->price->multiply($quantity));
        }

        return $subtotal;
    }
}
