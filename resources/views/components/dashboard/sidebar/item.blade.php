@props(['route', 'highlight'])

<div class="-mx-3">
    <a
        class="p-2 flex items-center justify-between hocus:bg-gray-300 dark:hocus:bg-gray-700 hocus:shadow-outline focus:outline-none rounded-lg transform duration-100 @route($highlight ?? $route) font-semibold bg-gray-300 @endif"
        href="{{ route($route) }}"
    >
        {{ $slot }}
    </a>
</div>
