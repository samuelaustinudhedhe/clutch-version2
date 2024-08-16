@props(['disabled' => false, 'id' => 'date'])

<input datepicker id="{{ $id }}" {{ $disabled ? 'disabled' : '' }} type="text" {!! $attributes->merge(['class' => 'bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 pl-10 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500']) !!}>

<?php
$scriptUrl = 'https://unpkg.com/flowbite@1.5.3/dist/datepicker.js';
$scriptLoaded = false;

foreach (get_included_files() as $file) {
    if (strpos($file, $scriptUrl) !== false) {
        $scriptLoaded = true;
        break;
    }
}

if (!$scriptLoaded) {
    echo '<script src="' . $scriptUrl . '"></script>';
}
?>