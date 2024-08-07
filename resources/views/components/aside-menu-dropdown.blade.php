@props(['name', 'items', 'href' => ''])

<li name="{{ $name ?? 'nav' }}" x-data="{ open: false }">
    @if (!empty($items))
        <div {{ $attributes->merge(['class' => 'flex items-center space-between p-2 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700']) }}>
            <a  @if(!empty($href)) href="{{ $href }}" @endif class="flex w-full text-left whitespace-nowrap gap-x-3">
                {{ $slot }}
            </a>
            <button type="button" @click="open = !open" class="pl-5" aria-controls="dropdown-{{ $name }}"
                :aria-expanded="open" data-collapse-toggle="dropdown-{{ $name }}">
                <svg aria-hidden="true" :class="{ 'rotate-90': open }" class="w-6 h-6 transition-transform transform"
                    fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
            </button>
        </div>
        <ul x-show="open" id="dropdown-{{ $name }}" class="py-2 space-y-2">
            {{ $items ?? $item }}
        </ul>
    @else
        <a @if(!empty($href)) href="{{ $href }}" @endif   {{ $attributes->merge(['class' => 'flex items-center p-2 text-base font-medium text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group gap-x-3']) }}>
            {{ $slot }}
        </a>
    @endif
</li>