@props(['id', 'activeClass' => '', 'inactiveClass' => '', 'xdivClass' => '', 'accordion' => 'collapse'])

<x-div {{ $attributes->merge(['class' => $xdivClass, 'id' => $id, 'data-accordion' => $accordion, 'data-active-classes' => $activeClass, 'data-inactive-classes' => $inactiveClass]) }}>
    {{ $slot }}
</x-div>
