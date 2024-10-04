<x-auth-layout>
    <div
        class="max-w-screen-xl mx-auto w-full top-0 left-0 px-4 py-6 text-lg font-semibold text-gray-600 dark:text-white">

    </div>
    <div class="max-w-screen-xl px-4 py-8 mx-auto lg:grid lg:gap-20 lg:py-16 lg:grid-cols-12">
        <div class="flex-col justify-between hidden mr-auto lg:flex lg:col-span-5 xl:col-span-6 xl:mb-0">
            <div>
            
                <div class="flex">
                    <svg class="w-8 h-8 mr-2 text-blue-600 shrink-0" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <div>
                        <h3 class="mb-2 text-xl font-bold leading-none text-gray-900 dark:text-white">Become a Host</h3>
                        <p class="mb-2 font-light text-gray-500 dark:text-gray-400">Register today to list your vehicle and start generating passive income. Join our community of hosts who are leveraging their assets for financial growth.</p>
                    </div>
                </div>
                <div class="flex pt-8">
                    <svg class="w-8 h-8 mr-2 text-blue-600 shrink-0" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <div>
                        <h3 class="mb-2 text-xl font-bold leading-none text-gray-900 dark:text-white">Drive with Freedom</h3>
                        <p class="mb-2 font-light text-gray-500 dark:text-gray-400">Explore a wide selection of vehicles available in your vicinity, shared by local owners. Experience the convenience and flexibility of self-driven journeys.</p>
                    </div>
                </div>
                <div class="flex pt-8">
                    <svg class="w-8 h-8 mr-2 text-blue-600 shrink-0" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <div>
                        <h3 class="mb-2 text-xl font-bold leading-none text-gray-900 dark:text-white">Join a Trusted Network</h3>
                        <p class="mb-2 font-light text-gray-500 dark:text-gray-400">Become part of a trusted network of drivers and vehicle owners. Clutch is the preferred choice for entrepreneurs and car enthusiasts, offering a diverse range of vehicles to meet your needs.</p>
                    </div>
                </div>
            </div>
            <nav>
                <ul class="flex space-x-4">
                    <li>
                        <span class="text-sm text-gray-500 dark:text-gray-400"> &copy; <?php echo date('Y') . ' ' . app_name(false) /*return app name*/; ?>.</span>
                    </li>
                    <li>
                        <a href="/about/"
                            class="text-sm text-gray-500 hover:underline hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">About</a>
                    </li>
                    <li>
                        <a href="/contact/"
                            class="text-sm text-gray-500 hover:underline hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">Contact</a>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="mb-6 text-center lg:hidden">

        </div>
        <div
            class="w-full mx-auto bg-white rounded-lg shadow dark:bg-gray-800 md:mt-0 sm:max-w-lg xl:p-0 lg:col-span-7 xl:col-span-6">
            <div class="p-6 space-y-4 lg:space-y-6 sm:p-8">
                <div>
                    <h1
                        class="text-xl font-bold leading-tight tracking-tight text-gray-900 sm:text-2xl dark:text-white">
                        Create your Account
                    </h1>
    
                    <div class="mt-2 mb-4 text-sm text-gray-600 dark:text-gray-400">
                        {{ __('Join us today to become a driver or host and begin your journey towards earning income effortlessly.') }}
                    </div>
                </div>
                {{-- Registration form --}}
                <x-validation-errors class="mb-4" />
                <form class="space-y-4 lg:space-y-6" method="POST" action="{{ route('register') }}" x-data="{ firstName: '', lastName: '', name: '' }" @submit.prevent="name = `${firstName} ${lastName}`; $nextTick(() => $el.submit())">
                    @csrf
                
                    <div class="sm:flex block sm:items-center w-full sm:justify-between sm:gap-5 ">
                        <div class="w-full mt-4">
                            <x-label for="firstName" value="{{ __('First Name') }}" />
                            <x-input id="firstName" class="block mt-1 w-full" type="text" name="firstName"
                                x-model="firstName" required autofocus autocomplete="given-name" />
                        </div>
                        <div class="w-full mt-4">
                            <x-label for="lastName" value="{{ __('Last Name') }}" />
                            <x-input id="lastName" class="block mt-1 w-full" type="text" name="lastName"
                                x-model="lastName" autocomplete="family-name" />
                        </div>
                    </div>
                    <div class="mt-4">
                        <x-label for="email" value="{{ __('Email') }}" />
                        <x-input id="email" class="block mt-1 w-full" type="email" name="email"
                            :value="old('email')" required autocomplete="email" />
                    </div>
                
                    <div class="mt-4">
                        <x-label for="password" value="{{ __('Password') }}" />
                        <x-input id="password" class="block mt-1 w-full" type="password" name="password"
                            placeholder="•-••-••-•••" required autocomplete="new-password" />
                    </div>
                
                    {{-- Hidden input for full name --}}
                    <input type="hidden" id="name" name="name" x-model="name">
                
                    {{-- Terms --}}
                    @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                    <div class="mt-4">
                        <x-label for="terms">
                            <div class="flex items-center">
                                <x-checkbox name="terms" id="terms" required class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800"/>
                
                                <div class="ms-2">
                                    {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                            'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-300 dark:focus:ring-offset-gray-800">'.__('Terms of Service').'</a>',
                                            'privacy_policy' => '<a target="_blank" href="'.route('privacy.show').'" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-300 dark:focus:ring-offset-gray-800">'.__('Privacy Policy').'</a>',
                                    ]) !!}
                                </div>
                            </div>
                        </x-label>
                    </div>
                    @endif
                
                    {{-- Newsletter --}}
                    <div class="flex items-start">
                        <div class="flex items-center h-5">
                            <input id="newsletter" aria-describedby="newsletter" type="checkbox"
                                class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800"
                                checked>
                        </div>
                        <div class="ml-3 text-sm">
                            <label for="newsletter" class="font-light text-gray-500 dark:text-gray-300">Send me
                                promotions and announcements via email.</label>
                        </div>
                    </div>
                
                    <x-button class="flex w-full justify-center items-center px-4 py-3">
                        {{ __('Create an account') }}
                    </x-button>
                
                    <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                        Already have an account? <a href="{{ route('login') }}"
                            class="font-medium text-blue-600 hover:underline dark:text-blue-500">Sign in here</a>
                    </p>
                </form>
            
                <div class="flex items-center">
                    <div class="w-full h-0.5 bg-gray-200 dark:bg-gray-700"></div>
                    <div class="px-5 text-center text-gray-500 dark:text-gray-400">or</div>
                    <div class="w-full h-0.5 bg-gray-200 dark:bg-gray-700"></div>
                </div>
                <div class="items-center space-y-3 sm:space-x-4 sm:space-y-0 sm:flex">
                    <a href="#"
                        class="w-full inline-flex items-center justify-center py-2.5 px-5 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-gray-900 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                        <svg class="w-8 h-8 mr-2" viewBox="0 0 21 20" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_13183_10121)">
                                <path
                                    d="M20.3081 10.2303C20.3081 9.55056 20.253 8.86711 20.1354 8.19836H10.7031V12.0492H16.1046C15.8804 13.2911 15.1602 14.3898 14.1057 15.0879V17.5866H17.3282C19.2205 15.8449 20.3081 13.2728 20.3081 10.2303Z"
                                    fill="#3F83F8" />
                                <path
                                    d="M10.7019 20.0006C13.3989 20.0006 15.6734 19.1151 17.3306 17.5865L14.1081 15.0879C13.2115 15.6979 12.0541 16.0433 10.7056 16.0433C8.09669 16.0433 5.88468 14.2832 5.091 11.9169H1.76562V14.4927C3.46322 17.8695 6.92087 20.0006 10.7019 20.0006V20.0006Z"
                                    fill="#34A853" />
                                <path
                                    d="M5.08857 11.9169C4.66969 10.6749 4.66969 9.33008 5.08857 8.08811V5.51233H1.76688C0.348541 8.33798 0.348541 11.667 1.76688 14.4927L5.08857 11.9169V11.9169Z"
                                    fill="#FBBC04" />
                                <path
                                    d="M10.7019 3.95805C12.1276 3.936 13.5055 4.47247 14.538 5.45722L17.393 2.60218C15.5852 0.904587 13.1858 -0.0287217 10.7019 0.000673888C6.92087 0.000673888 3.46322 2.13185 1.76562 5.51234L5.08732 8.08813C5.87733 5.71811 8.09302 3.95805 10.7019 3.95805V3.95805Z"
                                    fill="#EA4335" />
                            </g>
                            <defs>
                                <clipPath id="clip0_13183_10121">
                                    <rect width="20" height="20" fill="white" transform="translate(0.5)" />
                                </clipPath>
                            </defs>
                        </svg>
                        Sign up with Google
                    </a>
                    <a href="#"
                        class="w-full inline-flex items-center justify-center py-2.5 px-5 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-gray-900 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                        <svg class="w-8 h-8 mr-2 text-gray-900 dark:text-white" viewBox="0 0 21 20" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_13183_29163)">
                                <path
                                    d="M18.6574 15.5863C18.3549 16.2851 17.9969 16.9283 17.5821 17.5196C17.0167 18.3257 16.5537 18.8838 16.1969 19.1936C15.6439 19.7022 15.0513 19.9627 14.4168 19.9775C13.9612 19.9775 13.4119 19.8479 12.7724 19.585C12.1308 19.3232 11.5412 19.1936 11.0021 19.1936C10.4366 19.1936 9.83024 19.3232 9.18162 19.585C8.53201 19.8479 8.00869 19.985 7.60858 19.9985C7.00008 20.0245 6.39356 19.7566 5.78814 19.1936C5.40174 18.8566 4.91842 18.2788 4.33942 17.4603C3.71821 16.5863 3.20749 15.5727 2.80738 14.4172C2.37887 13.1691 2.16406 11.9605 2.16406 10.7904C2.16406 9.45009 2.45368 8.29407 3.03379 7.32534C3.4897 6.54721 4.09622 5.9334 4.85533 5.4828C5.61445 5.03219 6.43467 4.80257 7.31797 4.78788C7.80129 4.78788 8.4351 4.93738 9.22273 5.2312C10.0081 5.52601 10.5124 5.67551 10.7335 5.67551C10.8988 5.67551 11.4591 5.5007 12.4088 5.15219C13.3069 4.82899 14.0649 4.69517 14.6859 4.74788C16.3685 4.88368 17.6327 5.54699 18.4734 6.74202C16.9685 7.65384 16.2241 8.93097 16.2389 10.5693C16.2525 11.8454 16.7154 12.9074 17.6253 13.7506C18.0376 14.1419 18.4981 14.4444 19.0104 14.6592C18.8993 14.9814 18.7821 15.29 18.6574 15.5863V15.5863ZM14.7982 0.400358C14.7982 1.40059 14.4328 2.3345 13.7044 3.19892C12.8254 4.22654 11.7623 4.82035 10.6093 4.72665C10.5947 4.60665 10.5861 4.48036 10.5861 4.34765C10.5861 3.38743 11.0041 2.3598 11.7465 1.51958C12.1171 1.09416 12.5884 0.740434 13.16 0.458257C13.7304 0.18029 14.2698 0.0265683 14.7772 0.000244141C14.7921 0.133959 14.7982 0.267682 14.7982 0.400345V0.400358Z"
                                    fill="currentColor" />
                            </g>
                            <defs>
                                <clipPath id="clip0_13183_29163">
                                    <rect width="20" height="20" fill="white" transform="translate(0.5)" />
                                </clipPath>
                            </defs>
                        </svg>
                        Sign up with Apple
                    </a>
                </div>

            </div>
        </div>
    </div>
</x-auth-layout>
