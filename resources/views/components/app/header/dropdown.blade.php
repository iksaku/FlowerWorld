<div
    x-data="{ open: false }"
    class="flex-grow flex items-center"
    xmlns:x-transition="http://www.w3.org/1999/xhtml"
>
    <div>
        <button @click="open = true" class="w-full text-lg hocus:text-green-500 active:text-green-500 font-medium flex items-center focus:shadow-outline-green focus:outline-none space-x-1">
            {{ $button }}
        </button>

        <div class="relative">
            <div
                x-cloak
                x-show="open"
                @click.away="open = false"
                {{ $attributes->merge(['class' => 'absolute z-50 top-2 right-0 min-w-full flex flex-col bg-gray-50 border rounded-lg shadow whitespace-no-wrap overflow-hidden transform origin-top-right duration-75 divide-y divide-gray-300']) }}

                x-transition:enter="ease-out"
                x-transition:enter-start="opacity-0 scale-90"
                x-transition:enter-end="opacity-100 scale-100"
                x-transition:leave="ease-in"
                x-transition:leave-start="opacity-100 scale-100"
                x-transition:leave-end="opacity-90 scale-90"
            >
                {{ $slot }}
            </div>
        </div>
    </div>
</div>
