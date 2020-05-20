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
        if (Auth::guest()) {
            redirect(route('login'));

            return;
        }

        $user = Auth::user();

        $quantity = $user->shopping_cart()->find($this->productId)->pivot->quantity ?? 0;

        $user->shopping_cart()->syncWithoutDetaching([
            $this->productId => ['quantity' => ++$quantity]
        ]);

        $this->updateShoppingCart();
    }

    public function render()
    {
        return view('livewire.shopping.add-to-cart');
    }
}
