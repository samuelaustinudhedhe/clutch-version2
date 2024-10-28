{{--
    Generic Div Component

    This component provides a customizable div element with predefined styling for consistency across the application.
    It includes responsive padding, border, background color, and shadow effects, with support for dark mode.

    @author Pilot SAU
    @link https://github.com/samuelasutinudhedhe
--}}

<div {{ $attributes->merge(['class' => 'rounded-lg border border-gray-200 dark:border-gray-700 bg-white p-4 shadow-sm dark:bg-gray-800 sm:p-6 my-4']) }}>
    {{ $slot }}
</div>

