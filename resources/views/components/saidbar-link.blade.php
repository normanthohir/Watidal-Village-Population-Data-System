@props(['active'])

@php
    $classes =
        $active ?? false
            ? 'bg-orens bg-opacity-20 text-orens dark:bg-hijau/30 flex items-center pl-12 pr-3 py-2 text-base font-medium text-gray-900 rounded-r-full dark:text-white dark:hover:bg-hijau/20'
            : 'flex items-center pl-12 pr-3 py-2 text-base font-medium text-hitam rounded-r-full dark:text-putih hover:bg-orange-100 dark:hover:bg-hijau/10 ';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
