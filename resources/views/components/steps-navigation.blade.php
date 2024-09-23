@props([
    'nextPrefix' => 'Next:',
    'prevPrefix' => 'Prev:',
    'submit' => 'Submit',
    'currentStep' => 1,
    'totalSteps' => 5,
    'nextStepName' => null,
    'prevStepName' => null,
    'getStarted' => 'Get Started',
    'nextClass' => '',
    'prevClass' => '',
    'submitClass' => '',
])

{{-- Steps Navigation --}}
<div {{ $attributes->merge(['class' => 'flex justify-between mt-16 mb-6 space-x-3']) }}>
    @if ($currentStep > 1)
        <a href="#" wire:click.prevent="prevStep" wire:loading.attr="disabled" type="button"
            class="text-center items-center w-full py-2.5 sm:py-3.5 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700 {{ $prevClass }}">
            {{ $prevPrefix ? $prevPrefix . ' ' : '' }} {{ $prevStepName ?? '' }}
        </a>
    @endif

    @if ($currentStep < $totalSteps)
        <button type="button" wire:click.prevent="nextStep" wire:loading.attr="disabled"
            class="w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 sm:py-3.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 {{ $nextClass }}">
            @if ($currentStep < 1)
                {{ $getStarted }}
            @else
                {{ $nextPrefix ? $nextPrefix . ' ' : '' }}{{ $nextStepName ?? '' }}
            @endif
        </button>
    @else
        <button type="submit" wire:click="submit" wire:loading.attr="disabled"
            class="w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 sm:py-3.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 {{ $submitClass }}">
            {{ $submit ?? 'Submit' }}
        </button>
    @endif
</div>
