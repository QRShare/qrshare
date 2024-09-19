@props(['active'])

@php
    $classes =
        $active ?? false
            ? 'inline-block w-full text-app-primary text-bold -translate-y-1 py-2 mx-0 ml-6 font-medium text-left md:ml-0 md:w-auto md:px-0 md:mx-2 lg:mx-3 md:text-center transition-all duration-300'
            : 'inline-block w-full text-thin py-2 mx-0 ml-6 font-medium text-left md:ml-0 md:w-auto md:px-0 md:mx-2 lg:mx-3 md:text-center transition-all duration-300';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
