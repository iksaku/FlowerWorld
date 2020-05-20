<?php
/** @var App\Product $product */
/** @var App\Invoice $invoice */
?>

@extends('layouts.dashboard')
@section('title', 'Recibo')

@section('content')
    <div class="sm:mx-auto w-full sm:max-w-md sm:px-4 py-4 space-y-4" xmlns:wire="http://www.w3.org/1999/xhtml">
        <div class="text-2xl text-center font-semibold">
            Recibo
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

                <div class="text-right space-x-1">
                    <span class="fas fa-calendar-check"></span>
                    <span>{{ $invoice->created_at->format('F j, Y') }}</span>
                </div>
            </div>

            <div class="border-y-2 border-dashed divide-y-2">
                @foreach($groupedProducts as $shopId => $products)
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

                                            <p>{{ $product->pivot->quantity }}</p>
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
                        @price($subtotal)
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
