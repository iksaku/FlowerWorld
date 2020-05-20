<?php
/** @var App\Shop[] $shops */
?>

@extends('layouts.app')
@section('title', 'Inicio')

@section('content')
    <div class="flex-grow p-4 space-y-4">
        <h1 class="text-2xl text-center font-semibold">
            Selecciona tu Florería
        </h1>

        <div class="flex flex-wrap items-stretch justify-evenly">
            @foreach($shops as $shop)
                <div class="w-full sm:w-1/2 lg:w-1/4 px-4 py-2">
                    <a
                        class="h-full w-full flex flex-col items-center justify-center bg-gray-50 px-4 py-2 rounded-lg overflow-hidden hocus:shadow-outline focus:outline-none transform duration-200 hocus:scale-110 hocus:z-10 space-y-2"
                        href="{{ route('shop', $shop) }}"
                    >
                        <img
                            class="h-40 w-40 block rounded-lg mx-auto"
                            src="{{ $shop->logo }}"
                            alt="Logo de {{ $shop->name }}"
                        >

                        <p class="text-center text-lg uppercase">
                            {{ $shop->name }}
                        </p>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
