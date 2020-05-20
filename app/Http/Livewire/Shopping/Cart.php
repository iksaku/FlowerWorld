<?php

namespace App\Http\Livewire\Shopping;

use App\Http\Livewire\Modules\WithShoppingCart;
use App\Http\Livewire\Modules\UpdatesShoppingCart;
use App\Product;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

/**
 * Class Cart
 * @package App\Http\Livewire\Shopping
 *
 * @property-read Product[] $shoppingCart
 * @property-read Collection $products
 */
class Cart extends Component
{
    use UpdatesShoppingCart, WithShoppingCart;

    protected $listeners = [
        'updateShoppingCart' => '$refresh'
    ];

    public function cleanItems()
    {
        /* Limpia el carrito del usuario autenticado */
        Auth::user()->shopping_cart()->detach();

        /* Actualiza la vista del carrito */
        $this->updateShoppingCart();
    }


    public function render()
    {
        return view('livewire.shopping.cart');
    }
}
