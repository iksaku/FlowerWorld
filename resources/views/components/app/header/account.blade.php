<x-app.header.dropdown>
    <x-slot name="button">
        <span class="fas fa-user"></span>
    </x-slot>

    @auth
        <span class="w-full text-center px-4 py-2 whitespace-no-wrap">
            {{ Auth::user()->name }}
        </span>

        <a
            class="w-full hocus:text-green-700 text-center hocus:underline focus:outline-none px-4 py-2 whitespace-no-wrap"
            href="{{ route('dashboard.invoices.index') }}">
            Mis pedidos
        </a>

        <form action="{{ route('logout') }}" method="POST">
            @csrf

            <button
                type="submit"
                class="w-full hocus:text-gray-100 hocus:bg-red-700 focus:outline-none px-4 py-2 transition ease-in-out duration-150"
            >
                Cerrar Sesión
            </button>
        </form>
    @endauth

    @guest
        <x-app.header.item-link route="login" :dropdown="true">
            Iniciar Sesión
        </x-app.header.item-link>

        <x-app.header.item-link route="register" :dropdown="true">
            Registrarse
        </x-app.header.item-link>
    @endguest
</x-app.header.dropdown>
