<template x-if="sidebarOpen">
    <div
        @click="sidebarOpen = false"
        @keydown.window.escape="sidebarOpen = false"
        class="lg:hidden fixed z-40 inset-0 bg-black opacity-50"
    ></div>
</template>

<div
    x-ref="sidebar"
    class="fixed lg:sticky z-50 inset-y-0 left-0 w-64 bg-gray-100 border-r border-gray-400 overflow-y-auto transform -translate-x-full lg:translate-x-0"
    :class="sidebarOpen ? 'translate-x-0 duration-200 ease-out' : '-translate-x-full duration-200 ease-in'"
>
    <div class="flex items-center justify-between border-b border-gray-400 px-8 py-4">
        <h2 class="flex-grow md:text-center text-xl md:text-2xl font-semibold">
            {{ config('app.name') }}
        </h2>
        <button
            @click="sidebarOpen = false"
            class="lg:hidden"
        >
            <span class="text-2xl fas fa-times"></span>
        </button>
    </div>

    <nav class="font-medium px-8 py-4 space-y-8">
        <div class="space-y-2">
            <x-dashboard.sidebar.item route="index" highlight="">
                @lang('Volver al Sitio')
            </x-dashboard.sidebar.item>

            {{--<x-dashboard.sidebar.item route="dashboard.index">
                @lang('Dashboard')
            </x-dashboard.sidebar.item>--}}
        </div>

        <div class="space-y-2">
            <h3 class="text-xs text-gray-500 uppercase tracking-wide -mx-1">
                @lang('Recursos')
            </h3>

            <x-dashboard.sidebar.item route="dashboard.invoices.index" highlight="dashboard.invoices">
                @lang('Pedidos')
            </x-dashboard.sidebar.item>
        </div>
    </nav>
</div>
