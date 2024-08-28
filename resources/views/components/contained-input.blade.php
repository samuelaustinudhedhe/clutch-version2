@props(['disabled' => false, 'for' => '', 'name' => '', 'label' => ''])

<div class="mb-4">
    <x-label for={{ $for ?? $name }}>{{ $label }}</x-label>
    <input {{ $disabled ? 'disabled' : '' }} name={{ $name }} {!! $attributes->merge(['class' => 'bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500']) !!}>
    <x-input-error for={{ $for ?? $name }} />
</div>