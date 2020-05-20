<?php

namespace App\Http\Livewire\Shopping;

use App\Http\Livewire\Modules\UpdatesShoppingCart;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AddToCart extends Component
{
    use UpdatesShoppingCart;

    public $productId;

    public function mount($productId)
    {
        $this->productId = $productId;
    }

    public function addToCart()
    {
        /* Se pide iniciar sesión antes de agregar productos al carrito */
        if (Auth::guest()) {
            redirect(route('login'));

            return;
        }

        /* Obtiene al usuario actualmente autenticado */
        $user = Auth::user();

        /* Obtiene la cantidad agregada del artículo especifico */
        $quantity = $user->shopping_cart()->find($this->productId)->pivot->quantity ?? 0;

        /* Incrementa en 1 la cantidad del articulo en el carrito */
        $user->shopping_cart()->syncWithoutDetaching([
            $this->productId => ['quantity' => ++$quantity]
        ]);

        /* Actualiza la vista del carrito */
        $this->updateShoppingCart();
    }

    public function render()
    {
        return view('livewire.shopping.add-to-cart');
    }
}
