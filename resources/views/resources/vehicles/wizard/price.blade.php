<div>
    <x-div>

        <div class="mb-6">
            <x-label for="storeData.price.amount">Regular Price</x-label>
            <div class="flex gap-6 items-end">
                <div class="relative w-full">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none !text-lg">
                        ₦
                    </div>
                    <x-price-input id="amount" type="text" wire:model.lazy="storeData.price.amount"
                        class="!ps-8 !text-lg py-2" loadJS="true" placeholder="" />
                </div>
                <span class="!text-lg text-gray-600 dark:text-gray-400">
                    /day
                </span>
            </div>

            <x-input-error for="storeData.price.amount" />

        </div>

        <div class="mb-2 gap-4 text-sm sm:grid-cols-2 grid">
            <x-radio id="nosale" name="on_sale" selected value="false" wire:model.live="storeData.price.on_sale"
                showIcon="false" class="!p-2">
                <svg class="w-6 h-6 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                    height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M7.757 12h8.486M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
                <span class="w-full">No sale</span>
            </x-radio>
            <x-radio id="onsale" name="on_sale" value="true" wire:model.lazy="storeData.price.on_sale" checked
                showIcon="false" class="!p-2">
                <svg class="w-6 h-6 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                    height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8.5 11.5 11 14l4-4m6 2a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
                <span class="w-full">On sale</span>
            </x-radio>
            <x-input-error for="storeData.price.on_sale" />
        </div>

        @if (isset($storeData['price']['on_sale']) && $storeData['price']['on_sale'] === 'true')
            <hr class="my-6 border-gray-300 dark:border-gray-600">

            <div class="mb-4 mt-4">
                <x-label for="storeData.price.sale">On Sale Price</x-label>
                <div class="flex gap-6 items-end">
                    <div class="relative w-full">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none !text-lg">
                            ₦
                        </div>
                        <x-price-input id="sale" type="text" wire:model.live="storeData.price.sale"
                            class="!ps-8 !text-lg py-2" placeholder="" />
                    </div>
                    <span class="!text-lg text-gray-600 dark:text-gray-400">
                        /day
                    </span>
                </div>
                @if (isset($storeData['price']['sale']) &&
                        isset($storeData['price']['amount']) &&
                        str_replace(',', '', $storeData['price']['sale']) > str_replace(',', '', $storeData['price']['amount']))
                    <span class="text-red-500 text-sm">Sale price must be less than the amount.</span>
                @endif
                <x-input-error for="storeData.price.sale" />
            </div>

            <hr class="my-6 border-gray-300 dark:border-gray-600">

            <x-tooltip id="insurance-Question" icon=true class="mb-2" taClass="bg-gray-200 dark:bg-gray-700">
                <x-slot name="trigger">
                    Conditional Discount?
                </x-slot>
                <x-slot name="content">
                    Discount is applied if the user Rents for more than
                    <span>{{ countDays($storeData['price']['discount']['days']??1) }}</span>
                </x-slot>
            </x-tooltip>
            <div class="space-y-4">
                <div class="mt-4 mb-2 gap-4 text-sm sm:grid-cols-5 grid">

                    <x-radio id="daily" name="discount_days" selected value="1"
                        wire:model.live="storeData.price.discount.days" showIcon="false" class="!p-2">
                        Daily
                    </x-radio>
                    <x-radio id="2days" name="discount_days" value="2"
                        wire:model.live="storeData.price.discount.days" showIcon="false" class="!p-2">
                        2 days
                    </x-radio>
                    <x-radio id="3days" name="discount_days" value="3"
                        wire:model.live="storeData.price.discount.days" checked showIcon="false" class="!p-2">
                        3 days
                    </x-radio>
                    <x-radio id="5days" name="discount_days" value="5"
                        wire:model.live="storeData.price.discount.days" checked showIcon="false" class="!p-2">
                        5 days
                    </x-radio>
                    <x-radio id="1weeks" name="discount_days" value="7"
                        wire:model.live="storeData.price.discount.days" checked showIcon="false" class="!p-2">
                        1 week
                    </x-radio>
                    <x-input-error for="storeData.price.discount.days" />
                </div>
                <div class="text-sm text-green-600 dark:text-green-400"> The discount is applied if the vehicle is rented for 
                    <span class="font-bold"> {{ countDays($storeData['price']['discount']['days']??1) }} </span> or more 
                </div>
            </div>

        @endif
    </x-div>

</div>
