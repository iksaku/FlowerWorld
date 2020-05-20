@extends('layouts.base')

@section('body')
    <div class="min-h-screen w-full flex flex-col bg-gray-50">
        <x-app.header />

        <div class="flex-grow flex sm:px-4 py-8">
            @yield('content')
        </div>

        @unless($hideFooter ?? false)
            <hr class="border">
            <x-app.footer />
        @endunless
    </div>
@endsection
