@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-1 pt-1 border-b-2 border-yellow-700 text-sm font-medium leading-5 focus:outline-none focus:border-yellow-700 text-white transition'
            : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-yellow-300 hover:text-yellow-700 hover:border-yellow-300 focus:outline-none focus:text-yellow-700 focus:border-yellow-300 text-white transition';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
