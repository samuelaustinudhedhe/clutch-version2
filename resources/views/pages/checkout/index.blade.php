<main class="container mx-auto my-8 px-4 flex gap-6">
    <!-- Checkout Section -->
    <section class="w-3/5 bg-white dark:bg-gray-800 p-6 shadow-md rounded-lg">
        <h1 class="text-2xl font-bold mb-4">Checkout</h1>

        <!-- Free Cancellation Notice -->
        <div class="bg-blue-50 dark:bg-blue-900 text-blue-600 dark:text-blue-400 p-4 rounded-md mb-6">
            <p class="font-semibold">Free cancellation before February 12, 10:00 AM</p>
            <p class="text-sm text-blue-500 dark:text-blue-300">If your plans change, we've got your back.</p>
        </div>

        <!-- Protection Plans Section -->
        <section class="mb-6">
            <h2 class="text-xl font-semibold mb-2">Protection plans</h2>
            <p class="text-gray-600 dark:text-gray-300 text-sm mb-4">You must choose a protection plan when booking a Super Deluxe Class vehicle...</p>

            <!-- Plan Options -->
            <div class="space-y-4">
                <!-- Standard Plan -->
                <div class="border rounded-lg p-4 dark:border-gray-600" x-data="{ open: false }">
                    <div class="flex justify-between items-center">
                        <div>
                            <h3 class="font-bold">Standard</h3>
                            <p class="text-sm text-gray-600 dark:text-gray-300">Dependable — Hit the road confidently with solid protection.</p>
                        </div>
                        <button class="text-blue-600 dark:text-blue-400 text-sm" @click="open = !open">See details</button>
                    </div>
                    <!-- Details Dropdown -->
                    <div x-show="open" class="mt-2 text-sm text-gray-500 dark:text-gray-300">
                        Full coverage for accidents and incidents.
                    </div>
                </div>

                <!-- Minimum Plan -->
                <div class="border rounded-lg p-4 dark:border-gray-600" x-data="{ open: false }">
                    <div class="flex justify-between items-center">
                        <div>
                            <h3 class="font-bold">Minimum</h3>
                            <p class="text-sm text-gray-600 dark:text-gray-300">Cost-effective — Stay covered while pinching some pennies.</p>
                        </div>
                        <button class="text-blue-600 dark:text-blue-400 text-sm" @click="open = !open">See details</button>
                    </div>
                    <!-- Details Dropdown -->
                    <div x-show="open" class="mt-2 text-sm text-gray-500 dark:text-gray-300">
                        Basic coverage at an affordable rate.
                    </div>
                </div>
            </div>
        </section>

        <!-- Payment Method -->
        <section class="mb-6">
            <h2 class="font-semibold">Payment method</h2>
            <p class="text-blue-600 dark:text-blue-400 text-sm mt-2">American Express 3002</p>
        </section>

        <!-- Insurance Info -->
        <section class="mb-6">
            <h2 class="font-semibold">Your insurance info (optional)</h2>
            <a href="#" class="text-blue-600 dark:text-blue-400 text-sm">Add</a>
        </section>

        <!-- Terms and Conditions -->
        <div class="mb-6">
            <label class="inline-flex items-center">
                <input type="checkbox" class="form-checkbox dark:bg-gray-700 dark:border-gray-600">
                <span class="ml-2 text-sm text-gray-600 dark:text-gray-300">I agree to pay the total shown and to the <a href="#" class="text-blue-600 dark:text-blue-400">Turo terms of service</a> and <a href="#" class="text-blue-600 dark:text-blue-400">cancellation policy</a>.</span>
            </label>
        </div>

        <!-- Book Trip Button -->
        <button class="w-full bg-blue-600 dark:bg-blue-700 text-white py-3 rounded-md hover:bg-blue-700 dark:hover:bg-blue-800">Book this trip</button>
    </section>

    <!-- Booking Summary Section -->
    <aside class="w-2/5 bg-white dark:bg-gray-800 p-6 shadow-md rounded-lg">
        <div class="flex items-center mb-4">
            <img src="car_image.png" alt="Car" class="w-16 h-16 rounded-lg mr-4">
            <div>
                <h3 class="font-bold">Mercedes-benz AM... 2019</h3>
                <p class="text-sm text-gray-500 dark:text-gray-300">5.0★ (5 trips)</p>
            </div>
        </div>

        <div class="text-sm text-gray-600 dark:text-gray-300 mb-4">
            <p>Sun, Feb 13 - Wed, Feb 16</p>
            <p>10:00 AM</p>
        </div>

        <!-- Meeting Location -->
        <div class="mb-4">
            <h4 class="font-semibold">MEETING LOCATION</h4>
            <p class="text-sm text-gray-600 dark:text-gray-300">Los Angeles, CA 90026</p>
        </div>

        <!-- Price Breakdown -->
        <div class="text-sm text-gray-600 dark:text-gray-300 mb-4">
            <p>$400.00 x 3 days</p>
            <p>Trip fee: $127.32</p>
            <p>Total miles: 750 miles</p>
            <p>3rd day discount: -$80.00</p>
        </div>

        <!-- Total -->
        <div class="flex justify-between items-center font-semibold text-lg">
            <p>Total</p>
            <p>$1,267.32</p>
        </div>

        <div class="text-sm text-gray-500 dark:text-gray-300 mb-4">Refundable deposit: $750.00</div>

        <!-- Free Cancellation Notice -->
        <div class="bg-blue-50 dark:bg-blue-900 text-blue-600 dark:text-blue-400 p-4 rounded-md mb-4">
            <p class="font-semibold">Free cancellation</p>
            <p class="text-sm">Full refund before February 12, 10:00 AM in local time of the car.</p>
        </div>

        <!-- Promo Code -->
        <div class="text-blue-600 dark:text-blue-400 text-sm">Add promo code</div>
    </aside>
</main>