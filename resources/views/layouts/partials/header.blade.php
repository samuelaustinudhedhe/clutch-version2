{{-- Name: Main Header --}}
<div class="text-gray-600 body-font border-b dark:border-gray-800">
    <div class="lg:container flex flex-wrap items-center justify-between mx-auto p-5 gap-5 ">
        <a class="flex title-font font-medium items-center text-gray-900">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-linecap="round"
                stroke-linejoin="round" stroke-width="2" class="w-10 h-10 text-white p-2 bg-blue-500 rounded-full"
                viewBox="0 0 24 24">
                <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
            </svg>
            <span class="hidden lg:flex ml-3 text-xl">EaseWheels</span>
        </a>
        <nav
            class="hidden md:flex md:flex-nowrap items-center text-base justify-center md:ml-auto text-gray-500 md:mr-auto">
            <a class="min-w-fit dark:text-gray-200 px-4 py-1 hover:text-gray-800 dark:hover:text-gray-300">Find a
                car</a>
            <a class="min-w-fit dark:text-gray-200 px-4 py-1 hover:text-gray-800 dark:hover:text-gray-300">Insurance</a>
            <a class="min-w-fit dark:text-gray-200 px-4 py-1 hover:text-gray-800 dark:hover:text-gray-300">Help</a>
            <a class="min-w-fit dark:text-gray-200 px-4 py-1 hover:text-gray-800 dark:hover:text-gray-300">Loogin</a>
        </nav>

        <?php darkModeSwitch() ?> 

        <button type="button" class="inline-flex items-center gap-x-1.5 rounded-md bg-blue-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600">
          Become an Owner
          <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                class="w-4 h-4 ml-1" viewBox="0 0 24 24">
                <path d="M5 12h14M12 5l7 7-7 7"></path>
            </svg>
        </button>

        {{-- responsive --}}
        <div class="md:hidden inline-flex gap-1 hover:bg-gray-200 p-2 rounded-md">
            <svg class="" data-testid="IconHamburgerMenu24" fill="none" height="24" viewBox="0 0 24 24"
                width="24" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M19.15 6.85H4.85a.76.76 0 0 1-.75-.75c0-.41.34-.75.75-.75h14.3c.41 0 .75.34.75.75s-.34.75-.75.75Zm0 5.76H4.85a.76.76 0 0 1-.75-.75c0-.41.34-.75.75-.75h14.3c.41 0 .75.34.75.75s-.34.75-.75.75Zm0 6.01H4.85a.76.76 0 0 1-.75-.75c0-.41.34-.75.75-.75h14.3c.41 0 .75.34.75.75s-.34.75-.75.75Z"
                    fill="#121214"></path>
            </svg>
            <svg class="seo-pages-0" data-testid="IconAvatar224" fill="none" height="24" viewBox="0 0 24 24"
                width="24" xmlns="http://www.w3.org/2000/svg">
                <path clip-rule="evenodd"
                    d="M5.368 18.847a9.575 9.575 0 0 0 6.592 2.624 9.573 9.573 0 0 0 6.488-2.527c-2.387-3.465-6.419-3.5-6.485-3.5a4.957 4.957 0 0 1-4.954-4.951 4.957 4.957 0 0 1 4.95-4.951 4.956 4.956 0 0 1 4.193 7.587.625.625 0 0 1-1.058-.666 3.705 3.705 0 0 0-3.134-5.671 3.705 3.705 0 0 0-3.701 3.701 3.705 3.705 0 0 0 3.7 3.701c.183-.022 4.597.018 7.369 3.83a9.569 9.569 0 0 0 2.242-6.164c0-5.298-4.311-9.61-9.61-9.61-5.299 0-9.61 4.312-9.61 9.61 0 2.292.807 4.4 2.151 6.054.887-1.178 2.042-1.989 2.909-2.483a.625.625 0 0 1 .62 1.085c-.807.459-1.892 1.225-2.662 2.33Zm14.38.575a.62.62 0 0 1-.104.106 10.826 10.826 0 0 1-7.684 3.193c-5.988 0-10.86-4.872-10.86-10.861C1.1 5.872 5.972 1 11.96 1c5.988 0 10.86 4.872 10.86 10.86 0 2.937-1.172 5.605-3.072 7.562Z"
                    fill="#121214" fill-rule="evenodd"></path>
            </svg>
        </div>
    </div>
</div>
