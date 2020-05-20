<?php
/** @var App\Shop $shop */
?>

@extends('layouts.app')
@section('title', 'Inicio')

@section('content')
    <div class="flex-grow p-4 space-y-8">
        <h1 class="text-2xl text-center font-semibold">
            {{ $shop->name }}
        </h1>

        <div class="flex flex-wrap items-stretch">
            @foreach($shop->products as $product)
                <div class="w-full sm:w-1/2 md:w-1/3 lg:w-1/4 flex flex-col justify-between p-4">
                    <div class="w-full flex flex-col items-center justify-start bg-gray-50 p-4 rounded-lg overflow-hidden space-y-2">
                        <img
                            class="h-40 w-40 block rounded-lg mx-auto"
                            src="{{ $product->image }}"
                            alt="Logo de {{ $product->name}}"
                        >

                        <p class="text-gray-500 text-center font-semibold">
                            @price($product->price)
                        </p>

                        <p class="text-center uppercase">
                        {{ $product->name }}
                        </p>
                    </div>

                    @livewire('shopping.add-to-cart', ['productId' => $product->id])
                </div>
            @endforeach
        </div>

        <div class="space-y-2 text-xl text-center">
            <h2 class="text-2xl font-semibold">
                ¡Contactanos!
            </h2>

            <div>
                <span class="fas fa-envelope"></span>
                <a href="mailto:{{ $shop->email }}">{{ $shop->email }}</a>
            </div>

            <div>
                <span class="fas fa-map-marker-alt"></span>
                <span>{{ $shop->address }}</span>
            </div>
        </div>
    </div>
@endsection
