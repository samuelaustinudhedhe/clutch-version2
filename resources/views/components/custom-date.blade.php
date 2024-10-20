@props([
    'disabled' => false,
    'loadJS' => false,
    'id' => 'date-callender',
    'placeholder' => 'Select date',
    'width' => 'w-full',
    'autohide' => true,
    'format' => 'mm/dd/yyyy',
    'maxDate' => null,
    'minDate' => null,
    'orientation' => 'bottom',
    'buttons' => false,
    'autoSelectToday' => false,
    'title' => null,
    'rangePicker' => false,
    'onShow' => '() => {}',
    'onHide' => '() => {}',
])

<div @if ($loadJS) x-data="{
    initDatepicker(input) {
        const $datepickerEl = input;
        
        const options = {
            defaultDatepickerId: '{{ $id }}',
            autohide: {{ $autohide ? 'true' : 'false' }},
            format: '{{ $format }}',
            maxDate: {{ $maxDate ? "'$maxDate'" : 'null' }},
            minDate: {{ $minDate ? "'$minDate'" : 'null' }},
            orientation: '{{ $orientation }}',
            buttons: {{ $buttons ? 'true' : 'false' }},
            autoSelectToday: {{ $autoSelectToday ? 'true' : 'false' }},
            title: {{ $title ? "'$title'" : 'null' }},
            rangePicker: {{ $rangePicker ? 'true' : 'false' }},
            onShow: {{ $onShow }},
            onHide: {{ $onHide }},
        };

        const datepicker = new Datepicker($datepickerEl, options);

        Array.from($datepickerEl.attributes).forEach(attr => {
            if (attr.name.startsWith('wire:')) {
                $datepickerEl.addEventListener('hide', function() {
                    $wire.set(`${attr.value}`, $datepickerEl.value);
                });
            }
        });
    }
}"
x-init="() => { const input = document.getElementById('{{ $id }}'); initDatepicker(input); }" @endif
    class="relative {{ $width }}">
    <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
            fill="currentColor" viewBox="0 0 20 20">
            <path
                d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
        </svg>
    </div>
    <input {{ $disabled ? 'disabled' : '' }} id="{{ $id }}" type="text" @focus="initDatepicker($event.target)"
        {{ $attributes->merge([
            'class' =>
                'bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 pl-10 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500',
        ]) }}
        placeholder="{{ $placeholder }}">
</div>