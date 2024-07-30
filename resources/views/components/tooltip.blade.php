@props(['id'])

<div {{ $attributes->merge(['class' => 'group']) }} data-tooltip-target="{{ $id }}-tooltip" >
    {{ $trigger }}
</div>

<div id="{{ $id }}-tooltip" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-gray-600 dark:text-white transition-opacity duration-300 bg-white border border-gray-200/[.55] dark:border-gray-500/[.55] rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-800">
    {{ $content }}
    <div class="tooltip-arrow bg-white dark:bg-gray-800" data-popper-arrow=""></div>
</div>
