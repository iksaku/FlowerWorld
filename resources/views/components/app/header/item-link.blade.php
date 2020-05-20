@props(['route', 'dropdown' => false])

<a
    href="{{ route($route) }}"
    class="inline-block text-center hocus:text-green-700 focus:outline-none transition ease-out duration-150 @if($dropdown) px-4 py-2 @else text-lg font-medium border-b-2 border-transparent @endif @route($route) text-green-700 font-medium border-green-700 @endroute"
>
    {{ $slot }}
</a>
