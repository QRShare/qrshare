@props(['active', 'type'])

@php
$classes =
$active ?? false
? $type === 'rainbow' ? 'text-sm font-semibold leading-6 text-white lg:-translate-y-2 transition-all duration-300
relative flex lg:justify-center bg-gradient-to-bl from-indigo-500 via-purple-500 to-pink-500 rounded-lg text-white
lg:bg-white px-2
font-semibold' : 'text-sm font-semibold leading-6 text-white lg:-translate-y-2 transition-all duration-300 relative flex
lg:justify-center rounded-lg text-white px-2 font-semibold'
: 'text-sm font-semibold leading-6 transition-all duration-300 relative text-neutral-950 lg:text-white px-2
hover:lg:-translate-y-1 hover:translate-x-1 hover:lg:translate-x-0';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
    @if($active)
    <div class="absolute bottom-0 hidden w-1 h-1 translate-y-full bg-white rounded-full bg-gradient lg:block"></div>
    @endif
</a>