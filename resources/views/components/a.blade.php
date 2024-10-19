@props(['color'=>'blue', 'name' => '', 'size' => '', 'weight' => ''])

<a title="{{ $name }}" {{ $attributes->merge(['class'=>'inline-flex items-center gap-1 text-sm font-' . $weight . ' text-' . $color . '-500 no-underline hover:underline hover:text-' . $color . '-600 dark:text-' . $color . '-400 dark:hover:text-' . $color . '-300']) }}>
    {{ $slot }}
</a>