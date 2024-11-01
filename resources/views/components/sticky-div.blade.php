@props([
    'isSticky' => true,
    'position' => 'bottom-0',
    'bgFrom' => 'white',
    'darkBgFrom' => 'slate-900',
    'gradientDirection' => 'to-t',
    'paddingTop' => 'pt-16',
    'paddingBottom' => 'pb-4',
])

<div class="items-center w-full {{ $isSticky ? 'sticky ' . $position : '' }}">
    <div
        class="inset-x-0 {{ $position }} flex justify-center bg-gradient-{{ $gradientDirection }} from-{{ $bgFrom }} {{ $paddingTop }} {{ $paddingBottom }} pointer-events-none dark:from-{{ $darkBgFrom }}">
    </div>
    <div {{ $attributes->merge(['class' => '']) }}>
        {{ $slot }}
    </div>
</div>