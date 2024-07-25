{{-- Professionally Radio --}}
@props(['id', 'class' => '', 'color' => 'blue'])

<div>
    <input type="radio" id="{{ $id }}" {{  $attributes }}
        class="hidden peer">
    <label for="{{ $id }}" class="inline-flex items-center justify-center w-full p-5 text-gray-500 border-2 border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-{{ $color }}-500 peer-checked:border-{{ $color }}-600 peer-checked:text-{{ $color }}-600 bg-gray-50 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700 {{ $class }}">
        {{ $slot }}
        <svg class="w-6 h-6 ml-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd"
                d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z"
                clip-rule="evenodd"></path>
        </svg>
    </label>
</div>