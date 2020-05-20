<?php


namespace App\Http\Livewire\Modules;


trait UpdatesShoppingCart
{
    public function updateShoppingCart()
    {
        /* Emite una señal de actualización del carrito */
        $this->emit('updateShoppingCart');
    }
}
