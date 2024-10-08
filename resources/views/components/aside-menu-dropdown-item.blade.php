@props(['name'])
<li>
    <a {{ $attributes->merge([ 'class' => 'flex items-center text-sm p-2 pl-11 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700']) }}>
        {{ $name ?? $slot }}
    </a>
</li>
