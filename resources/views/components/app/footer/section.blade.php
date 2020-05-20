@props(['title', 'content'])

<div class="w-full md:w-1/3">
    <div class="text-xl text-green-700 font-semibold border-b-2 border-green-700 mb-3">
        {{ $title }}
    </div>
    <div {{ $attributes->merge(['class' => 'text-justify']) }}>
        {{ $slot }}
    </div>
</div>
