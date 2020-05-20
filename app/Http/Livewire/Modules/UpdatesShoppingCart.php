<?php


namespace App\Http\Livewire\Modules;


trait UpdatesShoppingCart
{
    public function updateShoppingCart()
    {
        $this->emit('updateShoppingCart');
    }
}
