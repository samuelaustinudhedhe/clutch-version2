@props(['id','name' => 'Accordion item','activeClass' => 'bg-white dark:bg-gray-800 text-gray-900 dark:text-white', 'inactiveClass' => '', 'divClass' => '', 'customIcon' => false, 'expanded' => 'true'])

@php
    $divClass = $divClass? $divClass : 'rounded-lg border border-gray-200 bg-white shadow-sm dark:border-gray-700 dark:bg-gray-800 my-4';
@endphp

<div class="relative {{ $divClass }}">

<button  id="{{ $id }}-title" title="{{ $name }}" type="button"  {{ $attributes->merge(['class' => 'flex items-center justify-between w-full p-4 sm:p-6 bg-unset']) }} data-active-classes="{{ $activeClass }}"
    data-inactive-classes="{{ $inactiveClass }}" data-accordion-target="#{{ $id }}-content" aria-expanded="{{ $expanded }}" aria-controls="{{ $id }}-content" >

    {{ $title }}

    @if (!$customIcon)
        <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="false" xmlns="http://www.w3.org/2000/svg"
            fill="none" viewBox="0 0 10 6">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M9 5 5 1 1 5" />
        </svg>
    @endif
</button>
<div id="{{ $id }}-content" class="{{ ($expanded === 'true' || $expanded === true) ? '' : 'hidden' }} p-4 !pt-0 sm:p-6 " aria-labelledby="{{ $id }}-title">
    {{ $content ?? $slot }}
</div>
</div>
