@props(['id', 'taClass' => 'bg-white dark:bg-gray-800', 'icon' => false, 'trigger' => 'hover'])

<div {{ $attributes->merge(['class' => 'flex items-center gap-1 group']) }} x-init="initTooltips()"
    @if (!$icon) data-tooltip-target="{{ $id }}-tooltip" data-tooltip-trigger="{{ $trigger }}"  @endif>
    {{ $trigger }}
    @if ($icon)
        <svg class="h-4 w-4 text-gray-400 hover:text-gray-900 dark:text-gray-500 dark:hover:text-white" aria-hidden="true"
            xmlns="http://www.w3.org/2000/svg" width="24" height="24"fill="currentColor" data-tooltip-target="{{ $id }}-tooltip"  data-tooltip-trigger="{{ $trigger }}" viewBox="0 0 24 24">
            <path fill-rule="evenodd"
                d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm9.408-5.5a1 1 0 1 0 0 2h.01a1 1 0 1 0 0-2h-.01ZM10 10a1 1 0 1 0 0 2h1v3h-1a1 1 0 1 0 0 2h4a1 1 0 1 0 0-2h-1v-4a1 1 0 0 0-1-1h-2Z"
                clip-rule="evenodd" />
        </svg>
    @endif
</div>

<div id="{{ $id }}-tooltip" role="tooltip"
    class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-gray-600 dark:text-white transition-opacity duration-300  border border-gray-200/[.55] dark:border-gray-500/[.55] rounded-lg shadow-sm opacity-0 tooltip {{ $taClass }}">
    {{ $content }}
    <div class="tooltip-arrow {{ $taClass }}" data-popper-arrow=""></div>
</div>
