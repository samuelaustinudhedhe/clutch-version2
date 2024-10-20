{{-- Select Version 1.0.2 --}}

@props([
    'disabled' => false,
    'title' => '- Select an option -',
    'loadJS' => false,
    'defaultValue' => null,
    'selected' => null,
])

<select {{-- Load the function if loadJS attribuite is set to true --}}
    @if ($loadJS === 'true' || $loadJS) x-data="{setDefaultOption(){const selectElements=document.querySelectorAll('select[data-default-value]');selectElements.forEach(select=>{const defaultValue=select.getAttribute('data-default-value');Array.from(select.attributes).forEach(attr=>{if(attr.name.startsWith('wire:')){if(!$wire.get(`${attr.value}`)){if(defaultValue){$wire.set(`${attr.value}`,defaultValue);select.value=defaultValue;}else{let defaultOption=Array.from(select.options).find(option=>option.hasAttribute('selected'));if(defaultOption&&defaultOption.value){$wire.set(`${attr.value}`,defaultOption.value);select.value=defaultOption.value;}else{$wire.set(`${attr.value}`,select.value);}}}}});});}}" x-init="setDefaultOption()" @endif
    {{ $disabled ? 'disabled' : '' }} title="{{ $title ?? '' }}" data-default-value="{{ $defaultValue ?? $selected }}"
    {{ $attributes->merge(['class' => 'bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500']) }}>
    @if ($title)
        <option disabled>{{ $title }}</option>
    @endif
    {{ $slot }}
</select>
