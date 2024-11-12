<div class="mx-4 lg:mx-6 lg:mb-2">
    <x-div class="flex sm:flex-row flex-col gap-4 justify-between !my-0 lg:!my-2">
        <div class="">
            <h1 class="text-xl font-bold ">
                {{ __('Trip: #') . $trip->id }}
            </h1>
        </div>

        <div>
            Status: <span
                class="px-3 py-1 rounded text-sm {{ $trip->status_text_color }}">{{ ucfirst($trip->status) }}</span>
        </div>
    </x-div>

    <div class="lg:flex lg:flex-row gap-4 lg:gap-6 ">
        <x-div class="min-w-[60%]">
            {{-- Featured Image --}}
            <div class="relative">
                <img src="{{ $trip->vehicle->featured_image_url }}"
                    class="rounded  min-w-80 w-full min-h-44 h-full object-cover" width="220px" height="180px"
                    alt="{{ $trip->vehicle->name }} image" />
            </div>

            {{-- <div class="w-full min-w-0 flex-1 space-y-4 md:max-w-md ">
                <a href="{{ route('vehicles.show', $trip->vehicle->id) }}" target="_blank"
                    class="!text-xl font-medium text-gray-900 dark:text-white hover:underline">{{ $trip->vehicle->name }}</a>
            </div> --}}

            <div class="my-8">
                @include('pages.vehicles.show.name', ['vehicle' => $trip->vehicle])
            </div>

            {{-- Host --}}
            @include('pages.vehicles.show.basic-details', ['vehicle' => $trip->vehicle])


        </x-div>

        <div class="w-full flex flex-col justify-between">
            <x-div>

                {{-- Distance Allowed --}}
                <div class="space-y-2">
                    <dl class="flex items-center justify-between gap-4">
                        <dt class="text-base font-normal text-gray-500 dark:text-gray-400">Start Date </dt>
                        <dd class="text-base font-medium text-gray-900 dark:text-white">
                            {{ isset($trip->details->start->timestamp) ? date('d, M Y h:i A', $trip->details->start->timestamp) : 'N/A' }}
                        </dd>
                    </dl>

                    <dl class="flex items-center justify-between gap-4">
                        <dt class="text-base font-normal text-gray-500 dark:text-gray-400">End Date </dt>
                        <dd class="text-base font-medium text-gray-900 dark:text-white">
                            {{ isset($trip->details->end->timestamp) ? date('d, M Y h:i A', $trip->details->end->timestamp) : 'N/A' }}
                        </dd>
                    </dl>
                    <dl class="flex items-center justify-between gap-4">
                        <dt class="text-base font-normal text-gray-500 dark:text-gray-400">Drop-off Location </dt>
                        <dd class="text-base font-medium text-gray-900 dark:text-white">
                            {{ formatAddress($trip->details->end->location, 'city, state, country') ?? 'N/A' }}</dd>
                    </dl>
                    <dl class="flex items-center justify-between gap-4">
                        <dt class="text-base font-normal text-gray-500 dark:text-gray-400">Pickup Location </dt>
                        <dd class="text-base font-medium text-gray-900 dark:text-white">
                            {{ formatAddress($trip->details->start->location, 'city, state, country') ?? 'N/A' }}</dd>
                    </dl>

                    <dl class="flex items-center justify-between gap-4">
                        <dt class="text-base font-normal text-gray-500 dark:text-gray-400">Allowed Mileage</dt>
                        <dd class="text-base font-medium text-gray-900 dark:text-white">
                            {{ $trip->vehicle->details->maximum_mileage ?? 'Unlimited' }}</dd>
                    </dl>

                    {{-- aditionaly millage cost --}}
                    @if (isset($trip->vehicle->details->maximum_mileage) || isset($trip->vehicle->price->cost_per_mileage))
                        <dl class="flex items-center justify-between gap-4">
                            <dt class="text-base font-normal text-gray-500 dark:text-gray-400">Price/Mileage</dt>
                            <dd class="text-base font-medium text-gray-900 dark:text-white">
                                {{ humanizePrice($trip->vehicle->price->cost_per_mileage ?? 100) }}</dd>
                        </dl>
                    @endif


                    <dl class="flex items-center justify-between gap-4">
                        <dt class="text-base font-normal text-gray-500 dark:text-gray-400">Discount</dt>
                        <dd class="text-base font-medium text-gray-900 dark:text-white">
                            {{ $trip->details->location->pickup->full ?? 'N/A' }}</dd>
                    </dl>

                    <dl class="flex items-center justify-between gap-4">
                        <dt class="text-base font-normal text-gray-500 dark:text-gray-400">Total Price</dt>
                        <dd class="text-base font-medium text-gray-900 dark:text-white">
                            {{ humanizePrice($trip->details->price->total_paid) ?? 'N/A' }}</dd>
                    </dl>
                </div>
            </x-div>

            <x-div class="flex space-x-6 ">
                @if ($this->trip->details->start->timestamp <= now()->timestamp && $this->trip->status === 'pending')
                    <button type="button" wire:click="requestEndTrip"
                        wire:confirm="Are you sure you want to end this trip?"
                        class="w-full bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        End Trip
                    </button>
                @else
                    <button type="button" wire:click="requestCancelTrip"
                        wire:confirm="Are you sure you want to cancle this trip?"
                        class="w-full bg-red-500 hover:bg-red-700 text-white py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Cancle Trip
                    </button>
                @endif

            </x-div>

        </div>

    </div>

</div>
