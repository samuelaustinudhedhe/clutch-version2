@props(['id','name' => 'Accordion item', 'divClass' => '', 'customIcon' => false])

<a id="{{ $id }}-title" title="{{ $name }}" type="button" class="flex items-center justify-between w-full gap-3 bg-transparent"
    data-accordion-target="#{{ $id }}-content" aria-expanded="true" aria-controls="{{ $id }}-content">

    {{ $title }}

    @if (!$customIcon)
        <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
            fill="none" viewBox="0 0 10 6">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M9 5 5 1 1 5" />
        </svg>
    @endif
</a>
<div id="{{ $id }}-content" class="hidden" aria-labelledby="{{ $id }}-title">
    {{ $content ?? $slot }}
</div>
