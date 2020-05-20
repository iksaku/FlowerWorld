<?php
/** @var App\Product $product */
?>

<div class="sm:mx-auto sm:w-full sm:max-w-md space-y-8" xmlns:wire="http://www.w3.org/1999/xhtml">
    <div class="text-2xl text-center font-semibold">
        Lista de Compra
    </div>

    <div class="sm:border sm:rounded-lg sm:shadow py-8 space-y-8">
        <div class="flex flex-col overflow-x-auto border-y-2 border-dashed px-6 sm:px-8 py-2">
            <div class="text-lg font-semibold pt-2">
                Productos
            </div>

            <div class="divide-y divide-gray-200">
                @foreach($this->products as $product)
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
                    class="w-full sm:w-2/3 md:w-1/2 text-gray-100 font-medium bg-green-500 hocus:bg-green-700 focus:shadow-outline-green focus:outline-none px-4 py-2 rounded-lg"
                    wire:click.prevent="proceedToPayment"
                >
                    Proceder al Pago
                </button>
            </div>
        </div>
    </div>
</div>
