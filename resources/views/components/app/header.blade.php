<header class="z-10 sticky inset-x-0 top-0 w-full text-gray-900 bg-gray-50 shadow">
    <nav class="container flex items-center justify-between px-4 sm:px-6 py-4 mx-auto">
        <a
            href="{{ route('index') }}"
            class="text-2xl font-semibold hocus:text-green-500"
        >
            {{ config('app.name') }}
        </a>

        <div class="flex items-center justify-end space-x-6 md:space-x-8">
            <div class="order-first flex items-center justify-end space-x-4 hidden md:block">
                <x-app.header.item-link route="index">
                    Inicio
                </x-app.header.item-link>
            </div>

            <div class="order-last md:hidden">
                <x-app.header.dropdown>
                    <x-slot name="button">
                        <span class="fas fa-bars"></span>
                    </x-slot>

                    <x-app.header.item-link route="index" :dropdown="true">
                        Inicio
                    </x-app.header.item-link>
                </x-app.header.dropdown>
            </div>

            <x-app.header.account />

            @livewire('shopping.cart')
        </div>
    </nav>
</header>
