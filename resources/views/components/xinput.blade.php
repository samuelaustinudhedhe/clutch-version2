@props(['disabled' => false, 'numberFormat' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500']) !!}
@if($numberFormat)
    x-data="{
        value: '',

        format() {
            let cleanValue = this.stripFormatting(this.value);

            // Automatically add decimal if more than 2 digits
            if (cleanValue.length > 2 && !cleanValue.includes('.')) {
                cleanValue = cleanValue.slice(0, -2) + '.' + cleanValue.slice(-2);
            }

            let [whole, decimal] = cleanValue.split('.');

            // Limit to two decimal places
            decimal = decimal?.slice(0, 2) ?? '';

            this.value = this.addCommas(whole) + (decimal ? '.' + decimal : '');
        },

        stripFormatting(val) {
            return val.replace(/[^0-9]/g, ''); // Remove everything except digits
        },

        addCommas(val) {
            return val.replace(/\B(?=(\d{3})+(?!\d))/g, ','); // Add commas to whole part
        }
    }"
    {{-- x-model="value" --}}
    x-on:input="format"
@endif
>
