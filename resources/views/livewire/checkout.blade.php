<?php
/** @var App\Product $product */
?>

<div class="sm:mx-auto w-full sm:max-w-md space-y-8" xmlns:wire="http://www.w3.org/1999/xhtml">
    <div class="text-2xl text-center font-semibold">
        Lista de Compra
    </div>

    <div class="border-y sm:border sm:rounded-lg sm:shadow py-8 space-y-8">
        <div class="flex justify-between px-6 sm:px-8">
            <div class="space-y-2">
                <div>{{ Auth::user()->name }}</div>
                <div class="space-x-1">
                    <span class="fas fa-envelope"></span>
                    <span>{{ Auth::user()->email }}</span>
                </div>
                <div class="space-x-1">
                    <span class="fas fa-map-marker-alt"></span>
                    <span>{{ Auth::user()->address }}</span>
                </div>
            </div>
        </div>

        <div class="border-y-2 border-dashed divide-y-2">
            @foreach($this->products as $shopId => $products)
                <div class="flex flex-col overflow-x-auto px-2 sm:px-4 py-2 border-dashed">
                    <div class="font-medium text-gray-500 mt-2">
                        {{ App\Shop::whereId($shopId)->first()->name }}
                    </div>

                    <div class="px-4 divide-y divide-gray-200">
                        @foreach($products as $product)
                            <div class="flex items-center justify-between py-2">
                                <div class="font-medium space-x-2">
                                    {{ $product->name }}

                                    <div class="flex items-center text-sm text-gray-700 space-x-4">
                                        <p>Cantidad:</p>

                                        <button
                                            class="hocus:text-gray-100 text-center text-lg font-bold hocus:bg-red-500 focus:shadow-outline-red focus:outline-none px-2 py-1 rounded-lg"
                                            wire:click.prevent="removeProduct({{ $product->id }})"
                                        >&minus;</button>

                                        <p>{{ $product->pivot->quantity }}</p>

                                        <button
                                            class="hocus:text-gray-100 text-center text-lg font-bold hocus:bg-green-500 focus:shadow-outline-green focus:outline-none px-2 py-1 rounded-lg"
                                            wire:click.prevent="addProduct({{ $product->id }})"
                                        >&plus;</button>
                                    </div>
                                </div>

                                <div>
                                    @price($product->price->multiply($product->pivot->quantity ?? 1))
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>

        <div class="space-y-4">
            <div class="flex items-center justify-between text-xl px-6 sm:px-8">
                <div class="font-semibold">
                    Total
                </div>

                <div class="font-medium">
                    @price($this->subTotal)
                </div>
            </div>

            <div class="w-full flex items-center justify-center">
                <button
                    class="w-2/3 md:w-1/2 text-gray-100 font-medium bg-green-500 hocus:bg-green-700 focus:shadow-outline-green focus:outline-none px-4 py-2 rounded-lg"
                    wire:click.prevent="proceedToPayment"
                >
                    Proceder al Pago
                </button>
            </div>
        </div>
    </div>
</div>
