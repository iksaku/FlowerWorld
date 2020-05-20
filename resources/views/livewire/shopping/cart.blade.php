<?php
/** @var App\Product $product */
?>

<x-app.header.dropdown class="-mr-16 sm:m-0">
    <x-slot name="button">
        <div class="relative">
            <span class="fas fa-shopping-bag"></span>

            @if(count($this->shoppingCart) > 0)
                <div class="absolute top-0 right-0 text-center text-sm font-bold rounded-full px-1 -mt-2 -mr-2">
                    {{ count($this->shoppingCart) }}
                </div>
            @endif
        </div>
    </x-slot>

    <div class="max-w-sm w-full" xmlns:wire="http://www.w3.org/1999/xhtml">
        @if(count($this->products) < 1)
            <div class="text-lg text-center p-4">
                No hay artículos en tu carrito.
            </div>
        @else
            <div class="max-h-56 flex flex-col divide-y divide-gray-200 overflow-y-auto">
                @foreach($this->products as $shopId => $products)
                    <div>
                        <div class="font-medium text-gray-500 px-4 pt-2">
                            {{ App\Shop::whereId($shopId)->first()->name }}
                        </div>

                        @foreach($products as $product)
                            <div class="min-w-0 flex items-center justify-between pl-6 pr-6 py-2 space-x-2">
                                <div class="w-2/3 flex-grow-0 flex items-center font-medium space-x-1">
                                    <span class="flex-grow truncate">
                                        {{ $product->name }}
                                    </span>

                                    <span class="text-sm text-gray-500">
                                        x{{ $product->pivot->quantity }}
                                    </span>
                                </div>

                                <div class="flex-shrink-0 text-right">
                                    @price($product->price->multiply($product->pivot->quantity ?? 1))
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endforeach
            </div>

            <div class="flex items-center justify-between border-t border-b border-gray-400 px-4 py-2">
                <div class="font-semibold">
                    Total
                </div>

                <div>
                    @price($this->subTotal)
                </div>
            </div>

            <div class="flex divide-x divide-gray-400">
                <button
                    class="w-full hocus:text-gray-100 text-center hocus:bg-red-700 px-4 py-2"
                    onclick="confirm('¿Estás seguro que deseas eliminar todos los artículos de tu carrito?') || event.stopImmediatePropagation()"
                    wire:click="cleanItems"
                >
                    Limpiar Carrito
                </button>

                <a
                    class="w-full block hocus:text-white text-center hocus:bg-green-500 px-4 py-2"
                    href="{{ route('checkout.index') }}"
                >
                    Proceder al Pago
                </a>
            </div>
        @endif
    </div>
</x-app.header.dropdown>
