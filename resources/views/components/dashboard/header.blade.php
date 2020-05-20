<header
    class="flex-shrink-0 flex items-center justify-between bg-gray-100 border-b border-gray-400 px-4 sm:px-6 space-x-6"
    xmlns:x-transition="http://www.w3.org/1999/xhtml"
>
    <div class="flex-shrink-0 min-w-0 flex py-4">
        <button
            @click="sidebarOpen = true"
            class="lg:hidden text-gray-700 mr-4"
        >
            <span class="text-2xl fas fa-bars"></span>
        </button>

        <div class="flex-shrink-1">
            <h1 class="text-xl md:text-2xl font-semibold">
                @hasSection('view-title')
                    @yield('view-title')
                @else
                    @yield('title')
                @endif
            </h1>
        </div>
    </div>

    <div>
        <x-app.header.dropdown>
            <x-slot name="button">
                <span class="fas fa-user"></span>
                <span class="hidden md:inline w-full ml-1 py-4">
                    {{ Auth::user()->name }}
                </span>
            </x-slot>

            <span class="md:hidden w-full text-center p-4 border-b border-gray-400 dark:border-gray-600 whitespace-no-wrap">
                {{ Auth::user()->name }}
            </span>

            <form action="{{ route('logout') }}" method="POST">
                @csrf

                <button
                    type="submit"
                    class="w-full hocus:text-gray-100 bg-transparent hocus:bg-red-700 focus:outline-none px-4 py-2 transition ease-in-out duration-150"
                >
                    Cerrar Sesión
                </button>
            </form>
        </x-app.header.dropdown>
    </div>
</header>
