<x-guest-layout>
    <section class="bg-white dark:bg-gray-900">
        <div class="max-w-screen-xl px-4 py-8 mx-auto sm:py-16 lg:py-24 pt-20 sm:pt-24 lg:pt-32">
            <div class="content-center grid-cols-2 gap-8 md:grid">
                <div class="self-center">
                    <h1 class="text-9xl font-bold text-gray-700 dark:text-gray-600">500</h1>
                    <h1 class="mb-4 text-2xl font-bold text-gray-700 dark:text-gray-600">Internal Server Error</h1>
                    <p class="mb-4 text-3xl font-bold tracking-tight text-gray-900 lg:mb-10 sm:text-4xl dark:text-white">
                        Something went wrong on our end. Please try again later.
                    </p>
                    <p class="mb-4 text-gray-500 dark:text-gray-400">Here are some helpful links to try now:</p>
                    <ul class="flex items-center space-x-4 text-gray-500 dark:text-gray-400">
                        <li>
                            <a href="{{ app_url() }}"
                                class="underline hover:text-gray-900 dark:hover:text-white">Home</a>
                        </li>
                        <li>
                            <a href="{{ app_url('/vehicles') }}"
                                class="underline hover:text-gray-900 dark:hover:text-white">Vehicles</a>
                        </li>
                        <li>
                            <a href="{{ app_url('/pages/contact') }}"
                                class="underline hover:text-gray-900 dark:hover:text-white">Support</a>
                        </li>
                    </ul>
                </div>
                <img class="hidden mx-auto mb-4 md:flex"
                    src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/500/500.svg" alt="500 Server Error">
            </div>
        </div>
    </section>
</x-guest-layout>