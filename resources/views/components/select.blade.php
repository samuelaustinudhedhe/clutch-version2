@props(['disabled' => false, 'default' => null])

<select 
    x-data="{
        setDefaultOption(select) {
            // Loop through all attributes to check for wire: attributes
            Array.from(select.attributes).forEach(attr => {
                if (attr.name.startsWith('wire:model')) {
                    let modelName = attr.value;

                    // Use Livewire's @this.get() to check if the model has a value
                    if (!@this.get(modelName)) {
                        // If no value is set in the model, use select.value as the default
                        @this.set(modelName, select.value);
                    }
                }
            });
        }
    }"
    x-init="setDefaultOption($el)"
    {{ $disabled ? 'disabled' : '' }}
    {{ $attributes->merge(['class' => 'bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500']) }}
>
    @if ($default)
        <option value="">{{ $default }}</option>
    @endif
    {{ $slot }}
</select>
