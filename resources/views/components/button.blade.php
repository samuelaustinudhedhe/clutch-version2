@props(['href' => '', 'color' => 'blue', 'focus' => 'true'])

@php
    if ($focus === 'true') {
        $classes = "inline-flex items-center px-4 py-2 bg-$color-700 dark:bg-$color-700 border border-transparent rounded-md font-semibold text-xs text-white dark:text-white tracking-widest hover:bg-$color-600 dark:hover:bg-$color-600 focus:bg-$color-600 dark:focus:bg-$color-600 active:bg-$color-900 dark:active:bg-$color-900 focus:outline-none focus:ring-2 focus:ring-$color-500 focus:ring-offset-2 dark:focus:ring-offset-$color-700 disabled:opacity-50 transition ease-in-out duration-150";
    } else {
        $classes = "inline-flex items-center gap-x-1.5 rounded-md bg-$color-600 dark:bg-$color-600 px-4 py-2 text-sm font-semibold text-white dark:text-white shadow-sm hover:bg-$color-500 dark:hover:bg-$color-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-$color-600";
    }
@endphp

<button onclick="window.location.href='{{ $href }}'" {{ $attributes->merge(['type' => 'submit', 'class' => $classes]) }}>
    {{ $slot }}
</button>
