@props(['active'])

@php
    $classes =
        $active ?? false
            ? 'text-sm font-semibold leading-6 text-white'
            : 'text-sm font-semibold leading-6 text-white transition-all duration-300';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
