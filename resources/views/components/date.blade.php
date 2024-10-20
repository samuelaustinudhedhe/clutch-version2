@props(['disabled' => false, 'loadJS' => false, 'id' => 'date-callender', 'placeholder' => 'Select date', 'width' => 'w-full', 'title' => '', 'position' => '', 'format' => 'mm/dd/yyyy', 'autohide' => false, 'min' => '', 'max' => ''])

<div @if ($loadJS) x-data="{ initDatepicker() { document.querySelectorAll('[datepicker]').forEach($datepickerEl => { Array.from($datepickerEl.attributes).forEach(attr => { if (attr.name.startsWith('wire:')) { $datepickerEl.addEventListener('hide', function() { $wire.set(`${attr.value}`, $datepickerEl.value); }); }  }); }); } }" @endif x-init="() => { setTimeout(() => { initDatepickers(); initDatepicker(); }, 500); }" class="relative {{ $width }}">
    <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
        </svg>
    </div>
    <input {{ $disabled ? 'disabled' : '' }} id="{{ $id }}" type="text" datepicker datepicker-autohide datepicker-title="{{$title}}" datepicker-orientation="{{ $position }}" datepicker-format="{{ $format }}" @if($autohide) datepicker-autohide @endif datepicker-max-date="{{ $max }}" datepicker-min-date="{{ $min }}" {{ $attributes->merge(['class' => 'bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 pl-10 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500']) }} placeholder="{{ $placeholder }}">
</div>
{{-- 
    ###################### Options ######################
        ## Disable datepicker ##
            Use the disabled attribute to disable the datepicker.

        ## Custom class names ##
            You can add custom class names to the input field using the class attribute.

        ## loadJS ##
            Date Picker Js should only be enabled for one date picker element in the blade file using the loadJS="true" attribute.

        ## Autohide ##
            Use the datepicker-autohide data attribute to make the datepicker disappear right after selecting a date.

        ## Action buttons ##
            By adding the datepicker-buttons data attribute you will enable the today and clear buttons:

            clicking on the today button will browse back to the current day/month/year
            clicking on the clear button will reset all selections
            If you want the button to additionally select today’s date, add datepicker-autoselect-today data attribute.

        ## Format ##
            If you want to use a custom format such as mm-dd-yyyy then you can use the datepicker-format="{format}" data attribute to change it.

        ## Min and Max dates ##
            Use the datepicker-min-date={format} and datepicker-max-date={format} to set the minimum and maximum dates that can be selected inside the datepicker. 

        ## Autohide ##
            Use the datepicker-autohide data attribute to make the datepicker disappear right after selecting a date.

        ## Title ##
            You can also add a title to the datepicker by using the datepicker-title="{title}" data attribute.

        ## Orientation ##
            You can override the default positioning algorithm by using the datepicker-orientation="{top|right|bottom|left}" data attributes. You can even combine right with bottom or left with top.

    visit https://flowbite.com/docs/components/datepicker/ for more info
--}}
