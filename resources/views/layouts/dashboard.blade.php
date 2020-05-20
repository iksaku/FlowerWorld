@extends('layouts.base')

@section('body')
    <div
        x-data="{ sidebarOpen: false }"
        x-init="$refs.sidebar.classList.remove('-translate-x-full')"
        class="min-h-screen w-full flex bg-gray-100"
    >
        <x-dashboard.sidebar />

        <div class="min-w-0 flex-1 w-full flex flex-col">
            <x-dashboard.header />

            <div class="min-w-0 flex-grow flex">
                @yield('content')
            </div>
        </div>
    </div>
@endsection
