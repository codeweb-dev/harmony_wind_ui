@props(['active'])

@php
    $classes =
        $active ?? false
            ? 'inline-flex items-center text-sm font-medium leading-5 text-primary-white'
            : 'inline-flex items-center text-sm font-medium leading-5 text-muted-color hover:text-primary-white transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
