@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} type="checkbox" {!! $attributes->merge(['class' => 'rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-blue-600 shadow-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:focus:ring-offset-gray-800']) !!}>
