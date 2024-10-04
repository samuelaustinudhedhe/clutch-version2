<x-auth-layout>
    <div
        class="max-w-screen-xl mx-auto w-full top-0 left-0 px-4 py-6 text-lg font-semibold text-gray-600 dark:text-white">

    </div>
    <div class="max-w-screen-xl px-4 items-start py-8 mx-auto lg:grid lg:gap-20 lg:py-16 lg:grid-cols-12">
           <div class="flex-col justify-between hidden mr-auto lg:flex lg:col-span-5 xl:col-span-6 xl:mb-0">
            <div>
                {{-- Logo Large --}}
                <a href="/" class="flex items-center mb-12 text-4xl font-semibold text-gray-900 lg:mb-10 dark:text-white">
                    <img class="w-12 h-12 mr-3" src="{{ app_logo() }}" alt="{{ app_name() }} logo">
                    {{ app_name() }}    
                </a>
                <div class="flex">

                    <svg class="w-8 h-8 mr-2 text-blue-500 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.5 11.5 11 13l4-3.5M12 20a16.405 16.405 0 0 1-5.092-5.804A16.694 16.694 0 0 1 5 6.666L12 4l7 2.667a16.695 16.695 0 0 1-1.908 7.529A16.406 16.406 0 0 1 12 20Z"/>
                      </svg>
                      
                    <div>
                        <h3 class="mb-2 text-xl font-bold leading-none text-gray-900 dark:text-white">Secure Your Account</h3>
                        <p class="mb-2 font-light text-gray-500 dark:text-gray-400">We prioritize your security by implementing robust measures to protect your account and personal data.</p>
                    </div>
                </div>
                <div class="flex pt-8">
                    <svg class="w-8 h-8 mr-2 text-blue-500 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14v3m-3-6V7a3 3 0 1 1 6 0v4m-8 0h10a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1v-7a1 1 0 0 1 1-1Z"/>
                      </svg>
                      
                    <div>
                        <h3 class="mb-2 text-xl font-bold leading-none text-gray-900 dark:text-white">Data Privacy</h3>
                        <p class="mb-2 font-light text-gray-500 dark:text-gray-400">Your data is encrypted and stored securely, ensuring that your information remains confidential.</p>
                    </div>
                </div>
                <div class="flex pt-8">
                    <svg class="w-8 h-8 mr-2 text-blue-500 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8.032 12 1.984 1.984 4.96-4.96m4.55 5.272.893-.893a1.984 1.984 0 0 0 0-2.806l-.893-.893a1.984 1.984 0 0 1-.581-1.403V7.04a1.984 1.984 0 0 0-1.984-1.984h-1.262a1.983 1.983 0 0 1-1.403-.581l-.893-.893a1.984 1.984 0 0 0-2.806 0l-.893.893a1.984 1.984 0 0 1-1.403.581H7.04A1.984 1.984 0 0 0 5.055 7.04v1.262c0 .527-.209 1.031-.581 1.403l-.893.893a1.984 1.984 0 0 0 0 2.806l.893.893c.372.372.581.876.581 1.403v1.262a1.984 1.984 0 0 0 1.984 1.984h1.262c.527 0 1.031.209 1.403.581l.893.893a1.984 1.984 0 0 0 2.806 0l.893-.893a1.985 1.985 0 0 1 1.403-.581h1.262a1.984 1.984 0 0 0 1.984-1.984V15.7c0-.527.209-1.031.581-1.403Z"/>
                      </svg>
                      
                    <div>
                        <h3 class="mb-2 text-xl font-bold leading-none text-gray-900 dark:text-white">Trusted by Users</h3>
                        <p class="mb-2 font-light text-gray-500 dark:text-gray-400">Join a community that values security and trust, with systems in place to safeguard your experience.</p>
                    </div>
                </div>
            </div>
            <nav class="mt-40">
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
        {{-- Logo Small --}}
        <div class="mb-12 text-center lg:hidden">
            <a href="#" class="inline-flex items-center text-4xl font-semibold text-gray-900 lg:hidden dark:text-white">
                <img class="w-12 h-12 mr-3" src="{{ app_logo() }}" alt="{{ app_name() }} logo">
                {{ app_name() }}
            </a>
        </div>
        <div
            class="w-full mx-auto bg-white rounded-lg shadow dark:bg-gray-800 md:mt-0 sm:max-w-lg xl:p-0 lg:col-span-7 xl:col-span-6">
            <div class="p-6 space-y-4 lg:space-y-6 sm:p-8">
                <div>
                    <h1
                        class="text-xl font-bold leading-tight tracking-tight text-gray-900 sm:text-2xl dark:text-white">
                        Password Recovery
                    </h1>

                    <div class="mt-2 mb-4 text-sm text-gray-600 dark:text-gray-400">
                        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
                    </div>
                </div>

                @session('status')
                    <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
                        {{ $value }}
                    </div>
                @endsession

                {{-- Registration form --}}
                <x-validation-errors class="mb-4" />

                <form class="space-y-4 lg:space-y-6" method="POST" action="{{ route('password.email') }}">
                    @csrf

                    <div class="block">
                        <x-label for="email" value="{{ __('Email') }}" />
                        <x-xinput id="email" type="email" name="email" :value="old('email', $request->email)" required autofocus
                            autocomplete="email" />
                    </div>

                    @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                        <div class="my-8">
                            <x-label for="terms">
                                <div class="flex items-center">
                                    <x-checkbox name="terms" id="terms" required
                                        class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800" />

                                    <div class="ms-2">
                                        {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                            'terms_of_service' =>
                                                '<a target="_blank" href="' .
                                                route('terms.show') .
                                                '" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-300 dark:focus:ring-offset-gray-800">' .
                                                __('Terms of Service') .
                                                '</a>',
                                            'privacy_policy' =>
                                                '<a target="_blank" href="' .
                                                route('privacy.show') .
                                                '" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-300 dark:focus:ring-offset-gray-800">' .
                                                __('Privacy Policy') .
                                                '</a>',
                                        ]) !!}
                                    </div>
                                </div>
                            </x-label>
                        </div>
                    @endif

                    <div class="flex items-center justify-end mt-4">
                        <x-button class="flex w-full justify-center items-center px-4 py-2.5">
                            {{ __('Email Password Reset Link') }}
                        </x-button>
                    </div>
                </form>
                <div class="flex items-center">
                    <div class="w-full h-0.5 bg-gray-200 dark:bg-gray-700"></div>
                    <div class="px-5 text-center text-gray-500 dark:text-gray-400">or</div>
                    <div class="w-full h-0.5 bg-gray-200 dark:bg-gray-700"></div>
                </div>
                <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                    Did you remember your passowrd? <x-a href="{{ route('login') }}">Login here</x-a>
                </p>

            </div>
        </div>
    </div>
</x-auth-layout>
