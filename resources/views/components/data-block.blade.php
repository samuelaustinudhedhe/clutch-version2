<div class="col-span-2 rounded-lg border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-700 dark:bg-gray-800 md:col-span-4">
    <h2 class="mb-4 text-lg font-semibold text-gray-900 dark:text-white md:mb-6">{{ $title }}</h2>
    <!-- List -->
    <dl class="list-inside text-gray-500 dark:text-gray-400 divide-y divide-gray-200 dark:divide-gray-700">
        @foreach ($items as $label => $value)
            <div class="0 sm:flex sm:items-center py-4 sm:justify-between @if($loop->last) pb-0 @endif">
                <dt class="font-semibold text-gray-900 dark:text-white">{{ $label }}</dt>
                <dd class="sm:text-end">
                    @if (is_array($value) && isset($value['url']))
                        <x-a class="hover:no-underline" color="gray" href="{{ $value['url'] }}">
                            {{ $value['text'] }}
                        </x-a>
                    @else
                        {{ $value }}
                    @endif
                </dd>
            </div>
        @endforeach
    </dl>
</div>