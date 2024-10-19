@props([
    'gap' => '6'
])

<hr {{ $attributes->merge(['class' => "my-{$gap} border-gray-300 dark:border-gray-600"]) }} />