<?php

namespace App\Http\Livewire;

use App\Http\Livewire\Modules\UpdatesShoppingCart;
use App\Http\Livewire\Modules\WithShoppingCart;
use App\Invoice;
use App\Product;
use App\ShoppingCarProductPivot;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Money\Money;

/**
 * Class Checkout
 * @package App\Http\Livewire
 *
 * @property-read Product[] $products
 * @property-read Money $subTotal
 */
class Checkout extends Component
{
    use UpdatesShoppingCart, WithShoppingCart;

    protected $listeners = [
        'updateShoppingCart' => '$refresh'
    ];

    public function addProduct($productId)
    {
        $user = Auth::user();

        $quantity = $user->shopping_cart()->find($productId)->pivot->quantity ?? 0;

        $user->shopping_cart()->syncWithoutDetaching([
            $productId => ['quantity' => ++$quantity]
        ]);

        $this->updateShoppingCart();
    }

    public function removeProduct($productId)
    {
        $user = Auth::user();

        /** @var ShoppingCarProductPivot $pivot */
        $pivot = $user->shopping_cart()->find($productId)->pivot ?? null;

        if (empty($pivot)) {
            return;
        }

        $quantity = $pivot->quantity - 1;

        if ($quantity <= 0) {
            $user->shopping_cart()->detach([$productId]);
        } else {
            $pivot->update(['quantity' => $quantity]);
        }

        $this->updateShoppingCart();
    }

    public function proceedToPayment()
    {
        $user = Auth::user();

        /** @var Invoice $invoice */
        $invoice = $user->invoices()->create([
            'total' => $this->subTotal->getAmount()
        ]);

        $invoice->products()->saveMany(
            $this->products
        );

        $user->shopping_cart()->detach();

        redirect(route('checkout.complete'));
    }

    public function render()
    {
        return view('livewire.checkout');
    }
}
