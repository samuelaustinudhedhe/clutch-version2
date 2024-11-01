@props(['id', 'activeClass' => 'bg-white dark:bg-gray-800 text-gray-900 dark:text-white', 'inactiveClass' => '', 'class' => '', 'accordion' => 'collapse'])

@php
    $class = $class
        ? $class
        : 'rounded-lg border border-gray-200 bg-white p-4 shadow-sm dark:border-gray-700 dark:bg-gray-800 sm:p-6 my-4';
@endphp


<div id="{{ $id }}" data-accordion="{{ $accordion }}" data-active-classes="{{ $activeClass }}"
    data-inactive-classes="{{ $inactiveClass }}" {{ $attributes->merge(['class' => $class]) }}>
    {{ $slot }}
</div>

